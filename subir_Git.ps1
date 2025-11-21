# Limpia la pantalla para empezar limpio
Clear-Host

Write-Host "==========================================" -ForegroundColor Cyan
Write-Host "   GESTOR DE SUBIDAS A GIT (MEJORADO)     " -ForegroundColor Cyan
Write-Host "==========================================" -ForegroundColor Cyan
Write-Host ""

# 1. COMPROBACIÓN DE SEGURIDAD: ¿Es esto un repo de git?
if (-not (Test-Path ".git")) {
    Write-Host "ERROR CRÍTICO: No se detecta la carpeta .git en este directorio." -ForegroundColor Red
    Write-Host "Asegúrate de estar en la raíz de tu proyecto." -ForegroundColor Yellow
    Read-Host "Presiona Enter para salir"
    exit
}

# 2. COMPROBACIÓN: ¿Hay cambios pendientes?
$status = git status --porcelain
if (-null -eq $status -or $status -eq "") {
    Write-Host "¡OJO! No hay cambios pendientes para subir." -ForegroundColor Yellow
    Read-Host "Presiona Enter para salir"
    exit
}

# 3. AGREGAR ARCHIVOS
Write-Host "1. Agregando archivos al staging..." -ForegroundColor Green
git add .

# Verificamos si el comando anterior funcionó correctamente
if ($LASTEXITCODE -ne 0) {
    Write-Host "Error al agregar archivos via 'git add'. Revisar permisos." -ForegroundColor Red
    exit
}

# 4. MENSAJE DEL COMMIT (Con validación)
do {
    $comentario = Read-Host "2. Escribe el mensaje del commit (Obligatorio)"
    if ([string]::IsNullOrWhiteSpace($comentario)) {
        Write-Host "   Error: El comentario no puede estar vacío." -ForegroundColor Red
    }
} while ([string]::IsNullOrWhiteSpace($comentario))

Write-Host "   Haciendo commit..." -ForegroundColor Gray
git commit -m "$comentario"

# 5. GESTIÓN DE RAMA (Inteligente)
# Detectamos la rama actual automáticamente para evitar errores humanos
$ramaActual = git rev-parse --abbrev-ref HEAD
Write-Host "   Estás actualmente en la rama: '$ramaActual'" -ForegroundColor Magenta

$inputRama = Read-Host "3. ¿A qué rama subir? (Presiona ENTER para usar '$ramaActual')"

if ([string]::IsNullOrWhiteSpace($inputRama)) {
    $NombreRama = $ramaActual
} else {
    $NombreRama = $inputRama
}

# 6. SUBIDA (PUSH)
Write-Host "   Subiendo cambios a 'origin/$NombreRama'..." -ForegroundColor Green
git push origin $NombreRama

# Comprobamos si el push fue exitoso (por ejemplo, si falla por falta de 'git pull' previo)
if ($LASTEXITCODE -eq 0) {
    Write-Host ""
    Write-Host "✅ ¡ÉXITO! Los cambios se han subido correctamente." -ForegroundColor Cyan
} else {
    Write-Host ""
    Write-Host "❌ ERROR EN EL PUSH." -ForegroundColor Red
    Write-Host "Es posible que necesites hacer un 'git pull' primero o que no tengas permisos." -ForegroundColor Yellow
}

Write-Host ""
Read-Host "Presiona Enter para cerrar"