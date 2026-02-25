<?php
session_start();
// 1. Seguridad (copia y pega de tus otros archivos)
if (!isset($_SESSION["user"]) || $_SESSION["user"]["rol"] != 1) {
    header("Location: index.php");
    exit;
}

require_once "dataBase.php";
require_once "vuelo.php";

// 2. Recogemos el ID del vuelo que queremos editar
$idVuelo = isset($_GET["idVuelo"]) ? $_GET["idVuelo"] : 0;

// Si no hay ID, nos vamos
if ($idVuelo == 0) {
    header("Location: admin.php");
    exit;
}

$db = new DataBase();
$vueloManager = new Vuelo($db->conectar());

// 3. Obtenemos las fotos actuales para verlas
$fotosActuales = $vueloManager->obtenerImagenes($idVuelo);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestionar Fotos del Vuelo <?php echo $idVuelo; ?></title>
</head>
<body>
    <h1>📸 Gestionando fotos del Vuelo ID: <?php echo $idVuelo; ?></h1>
    <a href="admin.php">Volver al panel</a>
    <hr>

    <h3>Fotos actuales:</h3>
    <div style="display: flex; gap: 10px;">
        <?php
        if (count($fotosActuales) > 0) {
            foreach ($fotosActuales as $foto) {
                echo "<div>";
                echo "<img src='" . $foto["ruta_imagen"] . "' width='150' style='border: 2px solid black;'>";
                echo "</div>";
            }
        } else {
            echo "<p>Este vuelo no tiene fotos todavía.</p>";
        }
        ?>
    </div>

    <hr>

    <h3>Subir nuevas fotos:</h3>
    <form action="gestion.php?accion=subirFotosExistentes" method="POST" enctype="multipart/form-data">
        
        <input type="hidden" name="idVuelo" value="<?php echo $idVuelo; ?>">
        
        <label>Selecciona las fotos:</label><br>
        <input type="file" name="imagenes[]" multiple accept="image/*" required><br><br>

        <button type="submit">Subir Fotos</button>
    </form>

</body>
</html>