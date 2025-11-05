<?php
include 'conexion.php';

$id = $_GET['id'];
$sql = "SELECT * FROM productos WHERE id = $id";
$resultado = $conn->query($sql);

if ($resultado->num_rows > 0) {
  $producto = $resultado->fetch_assoc();
} else {
  echo "Producto no encontrado.";
  exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title><?php echo $producto['nombre']; ?> - herror</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <div class="logo">herror</div>
    <nav>
      <ul>
        <li><a href="index.html">Inicio</a></li>
        <li><a href="catalogo.php">Catálogo</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <div class="producto-detalle">
      <img src="<?php echo $producto['imagen']; ?>" alt="<?php echo $producto['nombre']; ?>">
      <div class="info">
        <h1><?php echo $producto['nombre']; ?></h1>
        <p><?php echo $producto['descripcion']; ?></p>
        <p><strong><?php echo $producto['precio']; ?> €</strong></p>

        <h3>Asistente de tallas inteligente</h3>
        <form method="post">
          <label>Tipo de cuerpo:</label>
          <select name="cuerpo">
            <option value="delgado">Delgado</option>
            <option value="normal">Normal</option>
            <option value="robusto">Robusto</option>
          </select>

          <label>Preferencia de ajuste:</label>
          <select name="ajuste">
            <option value="ajustado">Ajustado</option>
            <option value="normal">Normal</option>
            <option value="holgado">Holgado</option>
          </select>

          <button type="submit">Recomendar talla</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $cuerpo = $_POST['cuerpo'];
          $ajuste = $_POST['ajuste'];

          // Lógica básica de recomendación
          if ($cuerpo == "delgado" && $ajuste == "ajustado") echo "<p>Recomendación: Talla S</p>";
          elseif ($cuerpo == "delgado" && $ajuste == "normal") echo "<p>Recomendación: Talla M</p>";
          elseif ($cuerpo == "normal" && $ajuste == "ajustado") echo "<p>Recomendación: Talla M</p>";
          elseif ($cuerpo == "normal" && $ajuste == "holgado") echo "<p>Recomendación: Talla L</p>";
          elseif ($cuerpo == "robusto") echo "<p>Recomendación: Talla XL</p>";
          else echo "<p>Recomendación: Talla M</p>";
        }
        ?>
      </div>
    </div>
  </main>

  <footer>
    <p>&copy; 2025 herror</p>
  </footer>
</body>
</html>
