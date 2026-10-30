<?php

declare(strict_types=1);

// $root debe apuntar a la carpeta principal city_farmar/.
$pageTitle = 'Dashboard';
$activePage = 'dashboard';

require $root . '/app/views/partials/admin/header.php'; ?>

<?php require $root . '/app/views/partials/admin/sidebar.php'; ?>

<main class="admin-content">
    <div class="d-flex flex-column flex-md-row justify-content-between gap-3 mb-4">
        <div>
            <h1 class="admin-page-title">Dashboard</h1>
            <p class="admin-page-subtitle">
                Bienvenido al panel de administración de City Farmac.
            </p>
        </div>

        <span class="badge text-bg-success align-self-md-start">
            <i class="bi bi-circle-fill me-1"></i>
            Sistema de demostración
        </span>
    </div>

    <!-- Acá agregaremos las tarjetas y métricas del dashboard. -->
</main>

<?php require $root . '/app/views/partials/admin/footer.php'; ?>