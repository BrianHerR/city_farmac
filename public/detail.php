<?php

declare(strict_types=1);

$root = dirname(__DIR__);

$products = require $root . '/app/data/products.php';
$brands = require $root . '/app/data/brands.php';
$comments = require $root . '/app/data/comments.php';

// Obtener el ID desde la URL.
$productId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if (!$productId || $productId < 1) {
    http_response_code(404);
    require $root . '/app/views/public/errors/404.php';
    exit;
}

// Buscar el producto.
$product = null;

foreach ($products as $item) {
    if ((int) $item['id'] === $productId && $item['active']) {
        $product = $item;
        break;
    }
}

if ($product === null) {
    http_response_code(404);
    require $root . '/app/views/public/errors/404.php';
    exit;
}

// Buscar la marca del producto.
$brand = ['name' => 'Sin marca'];

foreach ($brands as $item) {
    if ((int) $item['id'] === (int) $product['brand_id']) {
        $brand = $item;
        break;
    }
}

// Filtrar comentarios aprobados del producto.
$productComments = array_values(array_filter(
    $comments,
    static fn(array $comment): bool =>
    (int) ($comment['product_id'] ?? 0) === $productId
        && !empty($comment['approved'])
));
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        <?= htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8') ?>
        | City Farmac
    </title>

    <!-- Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Estilos propios -->
    <link rel="stylesheet" href="/assets/css/global.css">
    <link rel="stylesheet" href="/assets/css/public.css">
</head>

<body>

    <?php require $root . '/app/views/partials/public/header.php'; ?>

    <main>
        <?php require $root . '/app/views/public/products/detail.php'; ?>
    </main>

    <?php require $root . '/app/views/partials/public/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>