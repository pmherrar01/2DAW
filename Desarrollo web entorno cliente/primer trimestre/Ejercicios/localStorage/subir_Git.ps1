write-host "Inicio del script de subida a Git"

write-host "!. Agregando todos ñlos archivos modificados al staging..."
git add .

write-host "Dime el comentario del commit:"
$comentario = Read-Host
write-host "2. Haciendo commit con el comentario '$comentario'..."
git commit -m $comentario

write-host "Dimee el nombre de la rama a la que quieres subir los cambios (por defecto 'main'):"
$NombreRama  = Read-Host
write-host "3. Subiendo los cambios a la rama '$NombreRama'..."
git push origin $NombreRama

write-host "Preciona enter para salir."