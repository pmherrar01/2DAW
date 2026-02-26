<?php include 'includes/header.php'; ?>

<section class="hero-section d-flex align-items-center justify-content-center text-center">
    <div class="hero-content">
        <h2 class="display-1 fw-bold text-uppercase hero-title">New Collection</h2>
        <a href="#" class="btn btn-custom mt-4">Descubrir</a>
    </div>
</section>

<section class="container my-5 py-5 overflow-hidden">
    <h3 class="text-center fw-bold text-uppercase mb-5" style="letter-spacing: 4px;">Novedades</h3>

    <div id="carruselNovedades" class="carousel carousel-dark slide" data-bs-ride="carousel" data-bs-pause="hover">
        <div class="carousel-inner px-5"> <div class="carousel-item active" data-bs-interval="3000">
                <div class="row">
                    <div class="col-6 col-md-3">
                        <div class="card product-card border-0 bg-transparent">
                            <div class="img-wrapper"><img src="public/img/camiseta1.jpg" class="card-img-top" alt="Prenda 1"></div>
                            <div class="card-body text-center px-0">
                                <h5 class="card-title text-uppercase fw-bold fs-6 mt-2 mb-1">Camiseta Oversize Negra</h5>
                                <p class="card-text">25.99 €</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="card product-card border-0 bg-transparent">
                            <div class="img-wrapper"><img src="public/img/camiseta1.jpg" class="card-img-top" alt="Prenda 2"></div>
                            <div class="card-body text-center px-0">
                                <h5 class="card-title text-uppercase fw-bold fs-6 mt-2 mb-1">Hoodie Essential</h5>
                                <p class="card-text">49.99 €</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="card product-card border-0 bg-transparent">
                            <div class="img-wrapper"><img src="public/img/camiseta1.jpg" class="card-img-top" alt="Prenda 3"></div>
                            <div class="card-body text-center px-0">
                                <h5 class="card-title text-uppercase fw-bold fs-6 mt-2 mb-1">Pantalón Cargo</h5>
                                <p class="card-text">39.99 €</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="card product-card border-0 bg-transparent">
                            <div class="img-wrapper"><img src="public/img/camiseta1.jpg" class="card-img-top" alt="Prenda 4"></div>
                            <div class="card-body text-center px-0">
                                <h5 class="card-title text-uppercase fw-bold fs-6 mt-2 mb-1">Gorra Logo</h5>
                                <p class="card-text">19.99 €</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-item" data-bs-interval="3000">
                <div class="row">
                    <div class="col-6 col-md-3"><div class="card product-card border-0 bg-transparent"><div class="img-wrapper"><img src="public/img/camiseta1.jpg" class="card-img-top" alt="Prenda 5"></div><div class="card-body text-center px-0"><h5 class="card-title text-uppercase fw-bold fs-6 mt-2 mb-1">Sudadera Zip</h5><p class="card-text">55.00 €</p></div></div></div>
                    <div class="col-6 col-md-3"><div class="card product-card border-0 bg-transparent"><div class="img-wrapper"><img src="public/img/camiseta1.jpg" class="card-img-top" alt="Prenda 6"></div><div class="card-body text-center px-0"><h5 class="card-title text-uppercase fw-bold fs-6 mt-2 mb-1">Camiseta Basic</h5><p class="card-text">20.00 €</p></div></div></div>
                    <div class="col-6 col-md-3"><div class="card product-card border-0 bg-transparent"><div class="img-wrapper"><img src="public/img/camiseta1.jpg" class="card-img-top" alt="Prenda 7"></div><div class="card-body text-center px-0"><h5 class="card-title text-uppercase fw-bold fs-6 mt-2 mb-1">Tote Bag</h5><p class="card-text">15.00 €</p></div></div></div>
                    <div class="col-6 col-md-3"><div class="card product-card border-0 bg-transparent"><div class="img-wrapper"><img src="public/img/camiseta1.jpg" class="card-img-top" alt="Prenda 8"></div><div class="card-body text-center px-0"><h5 class="card-title text-uppercase fw-bold fs-6 mt-2 mb-1">Calcetines Crew</h5><p class="card-text">9.99 €</p></div></div></div>
                </div>
            </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carruselNovedades" data-bs-slide="prev" style="width: 5%;">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carruselNovedades" data-bs-slide="next" style="width: 5%;">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
</section>

<section class="container-fluid px-0 my-5 overflow-hidden">
    <div class="row g-0"> 
        
        <div class="col-md-6 collection-box position-relative">
            <img src="public/img/coleccion1.jpg" class="w-100 object-fit-cover collection-img" alt="Colección Hombre" style="height: 65vh;">
            
            <div class="collection-overlay d-flex flex-column align-items-center justify-content-center text-center">
                <h3 class="display-4 fw-bold text-white text-uppercase collection-title">Hombre</h3>
                <a href="#" class="btn btn-outline-light collection-btn mt-3">Ver Colección</a>
            </div>
        </div>

        <div class="col-md-6 collection-box position-relative">
            <img src="public/img/coleccion2.jpg" class="w-100 object-fit-cover collection-img" alt="Colección Mujer" style="height: 65vh;">
            
            <div class="collection-overlay d-flex flex-column align-items-center justify-content-center text-center">
                <h3 class="display-4 fw-bold text-white text-uppercase collection-title">Mujer</h3>
                <a href="#" class="btn btn-outline-light collection-btn mt-3">Ver Colección</a>
            </div>
        </div>

    </div>
</section>

<section class="newsletter-section py-5">
    <div class="container text-center py-4">
        <h3 class="display-6 fw-bold text-uppercase mb-3 newsletter-title">Unete a nosotros</h3>
        <p class="mb-4 newsletter-subtitle">Suscríbete para tener acceso anticipado a nuevas colecciones y descuentos exclusivos.</p>
        
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <form action="#" method="POST" class="newsletter-form d-flex align-items-center justify-content-center flex-wrap gap-3">
                    <input type="email" class="form-control newsletter-input flex-grow-1" placeholder="TU CORREO ELECTRÓNICO" required>
                    <button type="submit" class="btn btn-newsletter">Suscribirse</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>