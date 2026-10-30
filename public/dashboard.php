<?php

declare(strict_types=1);

session_start();

$root = dirname(__DIR__);

if (empty($_SESSION['user'])) {
    header('Location: /login.php');
    exit;
}

$profileId = (int) ($_SESSION['user']['profile_id'] ?? 0);

if (!in_array($profileId, [2, 3], true)) {
    header('Location: /index.php');
    exit;
}

require $root . '/app/views/admin/dashboard/index.php';
