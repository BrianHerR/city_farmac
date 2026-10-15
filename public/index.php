<?php

declare(strict_types=1);


// ==================================================
// 1. DEFINIR LA RAÍZ DEL PROYECTO
// ==================================================

$root = dirname(__DIR__);


// ==================================================
// 2. CARGAR LOS DATOS DE EJEMPLO
// ==================================================

$products = require $root . '/app/data/products.php';
$brands = require $root . '/app/data/brands.php';
$categories = require $root . '/app/data/categories.php';
$comments = require $root . '/app/data/comments.php';

// ==================================================
// 3. PREPARAR LOS DATOS PARA LAS VISTAS
// ==================================================

// Indexar marcas por ID para encontrarlas fácilmente.
$brandsById = [];

foreach ($brands as $brand) {
    $brandsById[$brand['id']] = $brand;
}

// Obtener productos activos y destacados.
$featuredProducts = array_values(array_filter(
    $products,
    static fn(array $product): bool =>
    $product['active'] && $product['featured']
));

// ==================================================
// 4. INICIAR LA PÁGINA
// ==================================================

?>
<
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta
            name="description"
            content="Descubrí productos de farmacia, perfumería, belleza y cuidado personal en City Farmac.">

        <title>City Farmac | Salud siempre contigo</title>

        <!-- Estilos generales
        <link rel="stylesheet" href="/assets/css/global.css">

        <!-- Estilos del sitio público -->
        <link rel="stylesheet" href="/assets/css/public.css">

        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
            rel="stylesheet">

        <!-- JavaScript -->
        <script src="/assets/js/main.js" defer></script>
    </head>

    <body>

        <!-- ENCABEZADO Y NAVEGACIÓN -->
        <?php require $root . '/app/views/partials/public/header.php'; ?>

        <main>

            <!-- SECCIÓN 1: INICIO -->

            <?php
            require $root . '/app/views/public/home/index.php';
            ?>

            <!-- SECCIÓN 3: PRODUCTOS -->
            <?php
            require $root . '/app/views/public/products/index.php';
            ?>



            <!-- SECCIÓN 5: CONTACTO -->
            <section id="contacto">
                <!-- Formulario de contacto -->
                <?php
                require $root . '/app/views/partials/public/contact_form.php';
                ?>
            </section>

        </main>

        <!-- PIE DE PÁGINA -->
        <?php require $root . '/app/views/partials/public/footer.php'; ?>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>