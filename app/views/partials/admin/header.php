<?php

declare(strict_types=1);

$pageTitle = $pageTitle ?? 'Panel de administración';
$currentUser = $_SESSION['user'] ?? [];

$userName = $currentUser['name']
    ?? trim(($currentUser['first_name'] ?? '') . ' ' . ($currentUser['last_name'] ?? ''));

if ($userName === '') {
    $userName = 'Administrador';
}

$profileName = $currentUser['profile_name'] ?? 'Administrador';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="Panel de administración de City Farmac">

    <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8') ?> | City Farmac</title>

    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Iconos Bootstrap -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        rel="stylesheet">

    <!-- Estilos del administrador -->
    <link rel="stylesheet" href="/assets/css/admin.css">
</head>

<body class="admin-body">

    <div class="admin-wrapper">

        <!-- Barra superior -->
        <header class="admin-topbar navbar navbar-expand bg-white border-bottom px-3 px-lg-4">
            <div class="container-fluid px-0">

                <button
                    class="btn btn-outline-secondary d-lg-none me-3"
                    type="button"
                    data-bs-toggle="offcanvas"
                    data-bs-target="#adminSidebar"
                    aria-controls="adminSidebar"
                    aria-label="Abrir menú">

                    <i class="bi bi-list fs-4"></i>
                </button>

                <a href="/dashboard.php" class="admin-brand text-decoration-none">
                    <span class="admin-brand-icon">
                        <i class="bi bi-shop"></i>
                    </span>
                    <span>City <strong>Farmac</strong></span>
                </a>

                <div class="ms-auto d-flex align-items-center gap-3">

                    <div class="text-end d-none d-sm-block">
                        <div class="fw-semibold small">
                            <?= htmlspecialchars($userName, ENT_QUOTES, 'UTF-8') ?>
                        </div>
                        <div class="text-secondary small">
                            <?= htmlspecialchars($profileName, ENT_QUOTES, 'UTF-8') ?>
                        </div>
                    </div>

                    <div class="admin-avatar" aria-hidden="true">
                        <i class="bi bi-person-fill"></i>
                    </div>

                </div>
            </div>
        </header>

        <!-- Contenedor principal: sidebar + contenido -->
        <div class="admin-main">