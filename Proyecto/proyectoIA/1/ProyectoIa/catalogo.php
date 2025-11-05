<?php include 'conexion.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Catálogo - herror</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <header>
    <div class="logo">herror</div>
    <nav>
      <ul>
        <li><a href="index.html">Inicio</a></li>
        <li><a href="configurador.php">Diseña tu prenda</a></li>
        <li><a href="experiencia.php">Experiencia</a></li>
        <li><a href="tallas.php">Tallas</a></li>
        <li><a href="chatbot.php">Chatbot</a></li>
      </ul>
    </nav>
  </header>

  <main>
    <h1>Catálogo</h1>
    <div class="catalogo">
      <?php
      $sql = "SELECT * FROM productos";
      $resultado = $conn->query($sql);

      if ($resultado->num_rows > 0) {
        while($row = $resultado->fetch_assoc()) {
          echo "<div class='producto'>";
          echo "<img src='" . $row["imagen"] . "' alt='" . $row["nombre"] . "'>";
          echo "<h2>" . $row["nombre"] . "</h2>";
          echo "<p>" . $row["descripcion"] . "</p>";
          echo "<p><strong>" . $row["precio"] . " €</strong></p>";
          echo "<button>Añadir al carrito</button>";
          echo "</div>";
        }
      } else {
        echo "No hay productos disponibles.";
      }
      ?>
    </div>
  </main>

  <footer>
    <p>&copy; 2025 herror</p>
  </footer>
</body>
</html>
