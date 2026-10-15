<nav class="navbar navbar-expand-lg bg-white border-bottom sticky-top">
    <div class="container">

        <!-- Logo que vuelve al inicio -->
        <a class="navbar-brand" href="#inicio">
            <img
                src="/assets/img/logo/logo.png"
                alt="City Farmac"
                width="150"
                height="55"
                class="img-fluid"
                style="object-fit: contain;">
        </a>

        <!-- Botón para dispositivos móviles -->
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarCityFarmac"
            aria-controls="navbarCityFarmac"
            aria-expanded="false"
            aria-label="Abrir menú de navegación">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menú -->
        <div class="collapse navbar-collapse" id="navbarCityFarmac">

            <?php require __DIR__ . '/navbar.php'; ?>

            <div class="ms-lg-3 mt-3 mt-lg-0">
                <a href="/login.php" class="btn btn-success">
                    Iniciar sesión
                </a>
            </div>

        </div>

    </div>
</nav>