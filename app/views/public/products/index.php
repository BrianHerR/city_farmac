<?php

declare(strict_types=1);

// Productos activos.
$activeProducts = array_values(array_filter(
    $products,
    static fn(array $product): bool => (bool) $product['active']
));

// Valores seleccionados en los filtros.
$selectedBrand = filter_input(INPUT_GET, 'brand', FILTER_VALIDATE_INT);
$selectedCategory = filter_input(INPUT_GET, 'category', FILTER_VALIDATE_INT);
$selectedSort = $_GET['sort'] ?? 'featured';

// Filtrar por marca y categoría/subcategoría.
$filteredProducts = array_values(array_filter(
    $activeProducts,
    static function (array $product) use (
        $selectedBrand,
        $selectedCategory
    ): bool {
        if (
            $selectedBrand !== null && $selectedBrand !== false
            && $selectedBrand > 0
            && (int) $product['brand_id'] !== $selectedBrand
        ) {
            return false;
        }

        if (
            $selectedCategory !== null && $selectedCategory !== false
            && $selectedCategory > 0
            && (int) $product['category_id'] !== $selectedCategory
            && (int) ($product['subcategory_id'] ?? 0) !== $selectedCategory
        ) {
            return false;
        }

        return true;
    }
));

// Ordenamiento.
switch ($selectedSort) {
    case 'rating':
        usort(
            $filteredProducts,
            static fn(array $a, array $b): int =>
            (int) $b['rating'] <=> (int) $a['rating']
        );
        break;

    case 'name-asc':
        usort(
            $filteredProducts,
            static fn(array $a, array $b): int =>
            strcasecmp($a['name'], $b['name'])
        );
        break;

    case 'name-desc':
        usort(
            $filteredProducts,
            static fn(array $a, array $b): int =>
            strcasecmp($b['name'], $a['name'])
        );
        break;

    case 'featured':
    default:
        usort(
            $filteredProducts,
            static fn(array $a, array $b): int =>
            (int) $b['featured'] <=> (int) $a['featured']
        );
        break;
}
?>

<section id="productos" class="container-fluid px-3 px-lg-5 py-5">

    <header class="text-center mb-5">
        <p class="text-success fw-bold text-uppercase">Nuestro catálogo</p>
        <h2 class="display-6 fw-bold">Productos para tu bienestar</h2>
        <p class="text-secondary">
            Encontrá productos de farmacia, belleza y cuidado personal.
        </p>
    </header>

    <div class="row g-4">

        <!-- Filtros laterales que hay que migrar a un partial -->
        <aside class="col-12 col-lg-3 col-xl-2">

            <div class="border rounded-3 p-3 p-lg-4 bg-white">

                <h3 class="h5 mb-4">Filtrar productos</h3>

                <form action="#productos" method="get">

                    <!-- Marca -->
                    <div class="mb-4">
                        <label for="brand-filter" class="form-label fw-semibold">
                            Marca
                        </label>

                        <select
                            class="form-select"
                            id="brand-filter"
                            name="brand">
                            <option value="">Todas las marcas</option>

                            <?php foreach ($brands as $brand): ?>
                                <?php if ($brand['active']): ?>
                                    <option
                                        value="<?= (int) $brand['id'] ?>"
                                        <?= (string) $selectedBrand === (string) $brand['id'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($brand['name'], ENT_QUOTES, 'UTF-8') ?>
                                    </option>
                                <?php endif; ?>
                            <?php endforeach; ?>

                        </select>
                    </div>

                    <!-- Categoría -->
                    <div class="mb-4">
                        <label for="category-filter" class="form-label fw-semibold">
                            Categoría
                        </label>

                        <select
                            class="form-select"
                            id="category-filter"
                            name="category">
                            <option value="">Todas las categorías</option>

                            <?php foreach ($categories as $category): ?>
                                <option
                                    value="<?= (int) $category['id'] ?>"
                                    <?= (string) $selectedCategory === (string) $category['id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($category['name'], ENT_QUOTES, 'UTF-8') ?>
                                </option>
                            <?php endforeach; ?>

                        </select>
                    </div>

                    <!-- Ordenamiento -->
                    <div class="mb-4">
                        <label for="sort-products" class="form-label fw-semibold">
                            Ordenar por
                        </label>

                        <select
                            class="form-select"
                            id="sort-products"
                            name="sort">
                            <option value="featured" <?= $selectedSort === 'featured' ? 'selected' : '' ?>>
                                Destacados
                            </option>
                            <option value="rating" <?= $selectedSort === 'rating' ? 'selected' : '' ?>>
                                Mejor calificados
                            </option>
                            <option value="name-asc" <?= $selectedSort === 'name-asc' ? 'selected' : '' ?>>
                                Nombre: A-Z
                            </option>
                            <option value="name-desc" <?= $selectedSort === 'name-desc' ? 'selected' : '' ?>>
                                Nombre: Z-A
                            </option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success w-100 mb-2">
                        Aplicar filtros
                    </button>

                    <a href="#productos" class="btn btn-outline-secondary w-100">
                        Limpiar filtros
                    </a>

                </form>

            </div>

        </aside>

        <!-- Catálogo -->
        <div class="col-12 col-lg-9 col-xl-10">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <p class="mb-0 text-secondary">
                    <strong><?= count($filteredProducts) ?></strong>
                    productos encontrados
                </p>
            </div>

            <?php if ($filteredProducts !== []): ?>

                <div class="row row-cols-2 row-cols-md-3 row-cols-xl-4 g-3 g-lg-4">

                    <?php foreach ($filteredProducts as $product): ?>

                        <div class="col">
                            <?php
                            require $root
                                . '/app/views/partials/public/product_card.php';
                            ?>
                        </div>

                    <?php endforeach; ?>

                </div>

            <?php else: ?>

                <div class="alert alert-light border text-center p-5">
                    <h3 class="h5">No hay productos para mostrar</h3>
                    <p class="mb-0">
                        Probá cambiar los filtros para encontrar otros productos.
                    </p>
                </div>

            <?php endif; ?>

        </div>

    </div>

</section>