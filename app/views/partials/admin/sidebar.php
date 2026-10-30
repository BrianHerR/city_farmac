<?php

declare(strict_types=1);

$activePage = $activePage ?? 'dashboard';

$menuGroups = [
    [
        'title' => 'GENERAL',
        'items' => [
            [
                'key' => 'dashboard',
                'label' => 'Dashboard',
                'icon' => 'bi-grid-1x2',
                'href' => '/dashboard.php',
            ],
        ],
    ],
    [
        'title' => 'CATÁLOGO',
        'items' => [
            [
                'key' => 'products',
                'label' => 'Productos',
                'icon' => 'bi-box-seam',
                'href' => '#',
            ],
            [
                'key' => 'categories',
                'label' => 'Categorías',
                'icon' => 'bi-tags',
                'href' => '#',
            ],
            [
                'key' => 'brands',
                'label' => 'Marcas',
                'icon' => 'bi-award',
                'href' => '#',
            ],
        ],
    ],
    [
        'title' => 'GESTIÓN',
        'items' => [
            [
                'key' => 'comments',
                'label' => 'Comentarios',
                'icon' => 'bi-chat-left-text',
                'href' => '#',
            ],
            [
                'key' => 'users',
                'label' => 'Usuarios',
                'icon' => 'bi-people',
                'href' => '#',
            ],
            [
                'key' => 'profiles',
                'label' => 'Perfiles y permisos',
                'icon' => 'bi-shield-lock',
                'href' => '#',
            ],
        ],
    ],
];
?>

<!-- Menú lateral -->
<aside
    class="admin-sidebar offcanvas-lg offcanvas-start"
    tabindex="-1"
    id="adminSidebar"
    aria-labelledby="adminSidebarLabel">

    <div class="offcanvas-header d-lg-none border-bottom">
        <h5 class="offcanvas-title" id="adminSidebarLabel">
            Menú de administración
        </h5>

        <button
            type="button"
            class="btn-close"
            data-bs-dismiss="offcanvas"
            data-bs-target="#adminSidebar"
            aria-label="Cerrar">
        </button>
    </div>

    <div class="offcanvas-body d-flex flex-column p-3 p-lg-3">

        <div class="sidebar-caption">MENÚ PRINCIPAL</div>

        <nav class="admin-nav" aria-label="Navegación administrativa">

            <?php foreach ($menuGroups as $group): ?>

                <div class="sidebar-section-title">
                    <?= htmlspecialchars($group['title'], ENT_QUOTES, 'UTF-8') ?>
                </div>

                <?php foreach ($group['items'] as $item): ?>
                    <a
                        href="<?= htmlspecialchars($item['href'], ENT_QUOTES, 'UTF-8') ?>"
                        class="admin-nav-link <?= $activePage === $item['key'] ? 'active' : '' ?>"
                        <?= $activePage === $item['key'] ? 'aria-current="page"' : '' ?>>

                        <i class="bi <?= htmlspecialchars($item['icon'], ENT_QUOTES, 'UTF-8') ?>"></i>

                        <span>
                            <?= htmlspecialchars($item['label'], ENT_QUOTES, 'UTF-8') ?>
                        </span>
                    </a>
                <?php endforeach; ?>

            <?php endforeach; ?>

        </nav>

        <div class="sidebar-bottom mt-auto pt-4">
            <a href="/index.php" class="admin-nav-link">
                <i class="bi bi-house"></i>
                <span>Volver al sitio</span>
            </a>

            <a href="/logout.php" class="admin-nav-link text-danger">
                <i class="bi bi-box-arrow-right"></i>
                <span>Cerrar sesión</span>
            </a>
        </div>

    </div>
</aside>