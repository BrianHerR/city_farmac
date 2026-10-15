<?php

declare(strict_types=1);

// Se espera recibir desde el punto de entrada:
// $product, $brand y $productComments.

$productName = htmlspecialchars(
    $product['name'] ?? 'Producto sin nombre',
    ENT_QUOTES,
    'UTF-8'
);

$description = htmlspecialchars(
    $product['description'] ?? 'Descripción no disponible.',
    ENT_QUOTES,
    'UTF-8'
);

$brandName = htmlspecialchars(
    $brand['name'] ?? 'Sin marca',
    ENT_QUOTES,
    'UTF-8'
);

$model = htmlspecialchars(
    $product['model'] ?? 'No especificado',
    ENT_QUOTES,
    'UTF-8'
);

$rating = max(0, min(5, (int) ($product['rating'] ?? 0)));

$price = number_format(
    (float) ($product['price'] ?? 0),
    0,
    ',',
    '.'
);

// Normalizar la ruta de la imagen.
$imagePath = str_replace('\\', '/', $product['image'] ?? '');
$imagePath = preg_replace('#^public/#', '', $imagePath);
$imagePath = '/' . ltrim($imagePath, '/');

$imagePath = htmlspecialchars(
    $imagePath,
    ENT_QUOTES,
    'UTF-8'
);

$productComments = $productComments ?? [];

?>

<section class="container py-5">

    <!-- Navegación de referencia -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/#inicio" class="text-success text-decoration-none">
                    Inicio
                </a>
            </li>

            <li class="breadcrumb-item">
                <a href="/#productos" class="text-success text-decoration-none">
                    Productos
                </a>
            </li>

            <li class="breadcrumb-item active" aria-current="page">
                Detalle del producto
            </li>
        </ol>
    </nav>

    <!-- DETALLE DEL PRODUCTO -->
    <div class="row g-4 g-lg-5 align-items-start">

        <!-- Imagen -->
        <div class="col-12 col-md-6">
            <div class="bg-light rounded-4 p-4 text-center">
                <img
                    src="<?= $imagePath ?>"
                    alt="<?= $productName ?>"
                    class="img-fluid"
                    style="width: 100%; height: 420px; object-fit: contain;">
            </div>
        </div>

        <!-- Información -->
        <div class="col-12 col-md-6">

            <p class="text-success fw-semibold mb-2">
                <?= $brandName ?>
            </p>

            <h1 class="display-6 fw-bold mb-3">
                <?= $productName ?>
            </h1>

            <p class="text-secondary mb-2">
                Modelo: <?= $model ?>
            </p>

            <!-- Calificación -->
            <div class="d-flex align-items-center gap-2 mb-4">
                <span
                    class="text-warning fs-5"
                    aria-label="Calificación: <?= $rating ?> de 5">
                    <?= str_repeat('★', $rating) . str_repeat('☆', 5 - $rating) ?>
                </span>

                <span class="text-secondary small">
                    <?= $rating ?>/5
                </span>
            </div>

            <!-- Precio -->
            <p class="display-6 fw-bold text-success mb-4">
                $<?= $price ?>
            </p>

            <!-- Descripción -->
            <h2 class="h5 fw-bold">Descripción</h2>

            <p class="text-secondary mb-4">
                <?= nl2br($description) ?>
            </p>

            <!-- Acciones visuales -->
            <div class="d-grid gap-2 d-sm-flex">
                <button type="button" class="btn btn-success btn-lg">
                    Consultar disponibilidad
                </button>

                <a
                    href="/#productos"
                    class="btn btn-outline-success btn-lg">
                    Volver al catálogo
                </a>
            </div>

            <div class="border-top mt-4 pt-3">
                <p class="small text-secondary mb-1">
                    <strong>Compra segura</strong>
                </p>

                <p class="small text-secondary mb-0">
                    Consultá disponibilidad y condiciones en nuestras sucursales.
                </p>
            </div>

        </div>
    </div>

    <!-- COMENTARIOS -->
    <section id="comentarios" class="mt-5 pt-4 border-top">

        <div class="row g-4">

            <!-- Lista de comentarios -->
            <div class="col-12 col-lg-7">

                <h2 class="h3 fw-bold mb-4">
                    Opiniones de nuestros clientes
                </h2>

                <?php if (count($productComments) > 0): ?>

                    <?php foreach ($productComments as $comment): ?>

                        <?php
                        $userName = htmlspecialchars(
                            $comment['user_name'] ?? 'Cliente',
                            ENT_QUOTES,
                            'UTF-8'
                        );

                        $commentText = htmlspecialchars(
                            $comment['content'] ?? '',
                            ENT_QUOTES,
                            'UTF-8'
                        );

                        $commentRating = max(
                            0,
                            min(5, (int) ($comment['rating'] ?? 0))
                        );
                        ?>

                        <article class="card border-0 shadow-sm mb-3">
                            <div class="card-body p-4">

                                <div class="d-flex justify-content-between
                                            align-items-start gap-3 mb-2">

                                    <h3 class="h6 fw-bold mb-0">
                                        <?= $userName ?>
                                    </h3>

                                    <span
                                        class="text-warning"
                                        aria-label="Calificación: <?= $commentRating ?> de 5">
                                        <?= str_repeat('★', $commentRating) .
                                            str_repeat('☆', 5 - $commentRating) ?>
                                    </span>

                                </div>

                                <p class="text-secondary mb-0">
                                    <?= nl2br($commentText) ?>
                                </p>

                            </div>
                        </article>

                    <?php endforeach; ?>

                <?php else: ?>

                    <div class="alert alert-light border" role="status">
                        Este producto todavía no tiene opiniones.
                        ¡Sé el primero en compartir tu experiencia!
                    </div>

                <?php endif; ?>

            </div>

            <!-- luego migrar el formulario de comentarios a partials -->
            <div class="col-12 col-lg-5">

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">

                        <h2 class="h4 fw-bold mb-3">
                            Dejá tu opinión
                        </h2>

                        <p class="text-secondary small">
                            Compartí tu experiencia con este producto.
                        </p>

                        <form action="#comentarios" method="post">

                            <div class="mb-3">
                                <label for="comment_name" class="form-label">
                                    Nombre
                                </label>

                                <input
                                    type="text"
                                    id="comment_name"
                                    name="user_name"
                                    class="form-control"
                                    placeholder="Tu nombre"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label for="comment_rating" class="form-label">
                                    Calificación
                                </label>

                                <select
                                    id="comment_rating"
                                    name="rating"
                                    class="form-select"
                                    required>
                                    <option value="">Seleccioná una calificación</option>
                                    <option value="5">★★★★★ - Excelente</option>
                                    <option value="4">★★★★ - Muy bueno</option>
                                    <option value="3">★★★ - Bueno</option>
                                    <option value="2">★★ - Regular</option>
                                    <option value="1">★ - Malo</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="comment_content" class="form-label">
                                    Tu comentario
                                </label>

                                <textarea
                                    id="comment_content"
                                    name="content"
                                    class="form-control"
                                    rows="4"
                                    placeholder="¿Qué te pareció el producto?"
                                    required></textarea>
                            </div>

                            <button type="submit" class="btn btn-success w-100">
                                Enviar comentario
                            </button>

                            <p class="small text-secondary mt-3 mb-0">
                                Formulario de demostración. Los comentarios
                                todavía no se guardan.
                            </p>

                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

</section>