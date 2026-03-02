<?php
require_once "./models/producto.php";
require_once "./models/imagen.php";
require_once "./config/db.php";

$db = new DataBase();
$producto = new Producto($db->conectar());
$imagen = new Imagen($db->conectar());

$listaProductos = $producto->listarProductos();



include './includes/header.php';
?>

<main class="container my-5 py-5 mt-5">

    <div class="row mb-5">
        <div class="col-12 text-center">
            <h1 class="display-5 fw-bold text-uppercase" style="letter-spacing: 4px;">Catálogo</h1>
            <p class="text-muted">Descubre todas nuestras colecciones</p>
        </div>
    </div>

    <div class="row">
        <aside class="col-lg-3 d-none d-lg-block mb-4">
            <div class="sticky-top" style="top: 100px; z-index: 1;">
                <h5 class="fw-bold text-uppercase mb-4 border-bottom pb-2">Filtros</h5>
                <p class="text-muted small">Aquí irán los tipos, colores y tallas...</p>
            </div>
        </aside>

        <section class="col-lg-9">

            <div class="row g-4">

                <?php
                if (!empty($listaProductos)) {
                    foreach ($listaProductos as $prenda) {
                        $listaImagenes = $imagen->listarImagenes($prenda["id"]);
                        $fotoHover = count($listaImagenes) > 1 ? $listaImagenes[1]["url_imagen"] : $prenda["url_imagen"];
                ?>

                        <div class="col-6 col-md-4">
                            <div class="card product-card border-0 bg-transparent h-100 position-relative">

                                <button type="button" class="btn btn-favorito position-absolute top-0 end-0 m-2" style="z-index: 10;" onclick="this.querySelector('i').classList.toggle('bi-heart'); this.querySelector('i').classList.toggle('bi-heart-fill');">
                                    <i class="bi bi-heart"></i>
                                </button>
                                <a href="fichaProducto.php?idPrenda=<?php echo $prenda["id"] ?>">
                                    <div class="img-wrapper position-relative">
                                        <img src="<?php echo $prenda["url_imagen"]; ?>" class="card-img-top img-principal" alt="Prenda">

                                        <img src="<?php echo $fotoHover; ?>" class="card-img-top img-hover position-absolute top-0 start-0 w-100 h-100" alt="Prenda Hover">
                                    </div>

                                    <div class="card-body text-center px-0">
                                        <h5 class="card-title text-uppercase fw-bold fs-6 mt-2 mb-1"><?php echo $prenda["nombre"] ?></h5>
                                        <p class="card-text"><?php echo $prenda["precio"] ?> €</p>
                                    </div>
                                </a>
                            </div>
                        </div>

                <?php
                    }
                } else {
                    echo "<p class='text-center'>No hay productos disponibles en este momento.</p>";
                }
                ?>

            </div>

        </section>
    </div>
</main>

<?php include './includes/footer.php'; ?>