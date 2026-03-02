<?php

require_once "./models/producto.php";
require_once "./models/imagen.php";
require_once "./config/db.php";

$db = new Database();
$producto = new Producto($db->conectar());
$imagen = new Imagen($db->conectar());

$idPrenda = isset($_GET["idPrenda"]) ? $_GET["idPrenda"] : 0;

$datosPrenda = $producto->obtenerProducto($idPrenda);
$galeria = $imagen->listarImagenes($idPrenda);

include './includes/header.php';

?>

    <main class="container my-5 py-5 mt-5">
    <div class="row">
        
        <div class="col-md-6 mb-4 mb-md-0">
            <div id="carruselProducto" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    
                    <?php 
                    // ¡AQUÍ VA TU MAGIA PHP! 
                    // Tienes que hacer un foreach de tu array $galeria.
                    // RECUERDA: La primera foto tiene que llevar la clase "active", las demás no.
                    ?>
                    
                    <div class="carousel-item active">
                        <img src="AQUI_LA_URL_DE_LA_IMAGEN" class="d-block w-100" alt="AQUI_EL_NOMBRE_DE_LA_PRENDA" style="object-fit: cover; aspect-ratio: 3/4;">
                    </div>
                    
                    <?php 
                    // Fin de tu bucle
                    ?>

                </div>
                
                <button class="carousel-control-prev" type="button" data-bs-target="#carruselProducto" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark p-3" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carruselProducto" data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-dark p-3" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </button>
            </div>
        </div>

        <div class="col-md-6 ps-md-5 d-flex flex-column justify-content-center">
            
            <h1 class="display-5 fw-bold text-uppercase mb-2">AQUI_EL_NOMBRE</h1>
            <p class="fs-3 fw-light mb-4">AQUI_EL_PRECIO €</p>

            <div class="mb-5">
                <p class="text-muted text-uppercase" style="letter-spacing: 2px; font-size: 0.85rem;">Descripción</p>
                <p class="fs-6" style="line-height: 1.8;">AQUI_LA_DESCRIPCION</p>
            </div>

            <form action="#" method="POST" class="mt-auto">
                
                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <label for="talla" class="form-label text-uppercase m-0" style="letter-spacing: 2px; font-size: 0.85rem;">Talla</label>
                        <a href="#" class="text-muted text-decoration-underline" style="font-size: 0.75rem;">Guía de tallas</a>
                    </div>
                    <select class="form-select border-dark rounded-0 py-2" id="talla" name="talla" required>
                        <option value="" selected disabled>Selecciona tu talla</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-dark w-100 py-3 rounded-0 text-uppercase fw-bold" style="letter-spacing: 2px; transition: all 0.3s ease;">
                    Añadir al Carrito
                </button>
            </form>

        </div>
    </div>
</main>
<?php

include './includes/footer.php';

?>