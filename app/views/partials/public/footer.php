<?php

declare(strict_types=1);
?>

<footer class="bg-dark text-white mt-5">

    <!-- Contenido del footer -->
    <div class="container py-5">

        <div class="row g-4">

            <!-- Identidad de la marca -->
            <div class="col-12 col-md-4">

                <h2 class="h4 fw-bold text-success">
                    City Farmac
                </h2>

                <p class="text-white-50 mb-0">
                    Salud siempre contigo.
                </p>

            </div>

            <!-- Enlaces útiles -->
            <div class="col-12 col-md-4">

                <h3 class="h5 fw-semibold mb-3">
                    Enlaces útiles
                </h3>

                <nav aria-label="Enlaces del pie de página"
                    class="d-flex flex-column gap-2">

                    <a href="#inicio"
                        class="link-light link-underline-opacity-0 link-underline-opacity-75-hover">
                        Inicio
                    </a>

                    <a href="#productos"
                        class="link-light link-underline-opacity-0 link-underline-opacity-75-hover">
                        Productos
                    </a>

                    <a href="#contacto"
                        class="link-light link-underline-opacity-0 link-underline-opacity-75-hover">
                        Contacto
                    </a>

                </nav>

            </div>

            <!-- Información de contacto -->
            <div class="col-12 col-md-4">

                <h3 class="h5 fw-semibold mb-3">
                    Contacto
                </h3>

                <p class="text-white-50 mb-2">
                    Estamos para ayudarte.
                </p>

                <p class="text-white-50 mb-0">
                    Atención al cliente
                </p>

            </div>

        </div>

    </div>

    <!-- Copyright -->
    <div class="border-top border-secondary">

        <div class="container py-3 text-center">

            <p class="text-white-50 small mb-0">
                &copy; <?= date('Y') ?> City Farmac.
                Todos los derechos reservados.
            </p>

        </div>

    </div>

</footer>