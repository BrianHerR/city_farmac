<?php

declare(strict_types=1);

$brand = $brandsById[$product['brand_id']]['name'] ?? 'Sin marca';

$imagePath = str_replace('\\', '/', $product['image']);
$imagePath = preg_replace('#^public/#', '', $imagePath);
$imagePath = '/' . ltrim($imagePath, '/');

$productName = htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8');
$brandName = htmlspecialchars($brand, ENT_QUOTES, 'UTF-8');

$rating = max(0, min(5, (int) ($product['rating'] ?? 0)));

$price = number_format(
    (float) $product['price'],
    0,
    ',',
    '.'
);
?>

<article class="card h-100 border-0 shadow-sm">

    <!-- Imagen -->
    <a href="#detalle-producto" class="d-block p-2 text-center">
        <img
            src="<?= htmlspecialchars($imagePath, ENT_QUOTES, 'UTF-8') ?>"
            alt="<?= $productName ?>"
            class="img-fluid"
            style="height: 260px; width: 100%; object-fit: contain;"
            loading="lazy">
    </a>

    <!-- Información -->
    <div class="card-body d-flex flex-column px-3 pt-2">

        <p class="small text-secondary mb-1">
            <?= $brandName ?>
        </p>

        <h3 class="fs-6 fw-semibold mb-2">
            <?= $productName ?>
        </h3>

        <p class="mb-3" aria-label="Calificación: <?= $rating ?> de 5">
            <span class="text-warning" aria-hidden="true"><?= str_repeat('★', $rating) ?></span><span class="text-secondary" aria-hidden="true"><?= str_repeat('☆', 5 - $rating) ?></span>
            <span class="small text-secondary">(<?= $rating ?>/5)</span>
        </p>

        <p class="fs-5 fw-bold text-success mt-auto mb-3">
            $<?= $price ?>
        </p>

        <a href="detail.php?id=<?= $product['id'] ?>" class="btn btn-outline-success w-100">
            Ver producto
        </a>

    </div>

</article>