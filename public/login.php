<?php

declare(strict_types=1);

session_start();

$root = dirname(__DIR__);

$errors = [];
$email = '';

if (empty($_SESSION['login_csrf'])) {
    $_SESSION['login_csrf'] = bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = strtolower(trim($_POST['email'] ?? ''));
    $password = $_POST['password'] ?? '';
    $csrfToken = $_POST['csrf_token'] ?? '';

    if (
        !is_string($csrfToken)
        || !hash_equals($_SESSION['login_csrf'], $csrfToken)
    ) {
        $errors[] = 'La solicitud expiró. Recargá la página e intentá nuevamente.';
    } elseif (
        !filter_var($email, FILTER_VALIDATE_EMAIL)
        || !is_string($password)
        || $password === ''
    ) {
        $errors[] = 'Ingresá un correo electrónico válido y tu contraseña.';
    } else {
        $users = require $root . '/app/data/users.php';
        $profiles = require $root . '/app/data/profiles.php';

        $matchedUser = null;

        // Buscar usuario por correo y contraseña.
        foreach ($users as $user) {
            if (
                strtolower($user['email']) === $email
                && hash_equals($user['password'], $password)
            ) {
                $matchedUser = $user;
                break;
            }
        }

        if ($matchedUser === null) {
            $errors[] = 'El correo o la contraseña son incorrectos.';
        } elseif (!$matchedUser['active']) {
            $errors[] = 'Esta cuenta está inactiva. Contactá con el administrador.';
        } else {
            // Buscar el perfil relacionado con el usuario.
            $matchedProfile = null;

            foreach ($profiles as $profile) {
                if (
                    (int) $profile['id'] ===
                    (int) $matchedUser['profile_id']
                ) {
                    $matchedProfile = $profile;
                    break;
                }
            }

            if ($matchedProfile === null || !$matchedProfile['active']) {
                $errors[] = 'El perfil de esta cuenta no está disponible.';
            } else {
                // Crear la sesión autenticada.
                session_regenerate_id(true);

                $_SESSION['user'] = [
                    'id' => $matchedUser['id'],
                    'name' => $matchedUser['name'],
                    'email' => $matchedUser['email'],
                    'profile_id' => $matchedProfile['id'],
                    'profile_name' => $matchedProfile['name'],
                    'permissions' => $matchedProfile['permissions'],
                ];

                // Renovar el token del formulario.
                $_SESSION['login_csrf'] = bin2hex(random_bytes(32));

                // Cliente: página principal.
                // Administrador y Super Administrador: dashboard.
                if ((int) $matchedProfile['id'] === 1) {
                    header('Location: /index.php');
                } else {
                    header('Location: /dashboard.php');
                }

                exit;
            }
        }
    }
}

require $root . '/app/views/admin/auth/login.php';
