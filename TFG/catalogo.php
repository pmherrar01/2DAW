<?php
require_once "./models/producto.php"; 
require_once "./config/db.php";

$db = new DataBase();
$producto = new Producto($db->conectar());

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

                foreach ($listaProductos as $producto ) {
                ?>

                <div class="col-6 col-md-4">
                    <div class="card product-card border-0 bg-transparent h-100">
                        <div class="img-wrapper">
                            <img src="<?php echo $producto["imagen"] ?>" class="card-img-top" alt="Prenda">
                        </div>
                        <div class="card-body text-center px-0">
                            <h5 class="card-title text-uppercase fw-bold fs-6 mt-2 mb-1"><?php echo $producto["nombre"] ?></h5>
                            <p class="card-text"><?php echo $producto["precio"] ?></p>
                        </div>
                    </div>
                </div>
                
                <?php 
                }
                ?>

            </div>
            
        </section>
    </div>
</main>

<?php include './includes/footer.php'; ?>