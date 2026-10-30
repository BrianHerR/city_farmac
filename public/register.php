<?php

declare(strict_types=1);


session_start();

$root = dirname(__DIR__);

$errors = [];
$old = [
    'first_name' => '',
    'last_name' => '',
    'username' => '',
    'email' => '',
];

if (empty($_SESSION['register_csrf'])) {
    $_SESSION['register_csrf'] = bin2hex(random_bytes(32));
}

if (!isset($_SESSION['demo_users'])) {
    $_SESSION['demo_users'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old['first_name'] = trim($_POST['first_name'] ?? '');
    $old['last_name'] = trim($_POST['last_name'] ?? '');
    $old['username'] = trim($_POST['username'] ?? '');
    $old['email'] = strtolower(trim($_POST['email'] ?? ''));

    $password = $_POST['password'] ?? '';
    $passwordConfirmation = $_POST['password_confirmation'] ?? '';
    $csrfToken = $_POST['csrf_token'] ?? '';

    // Validar token del formulario.
    if (
        !is_string($csrfToken)
        || !hash_equals($_SESSION['register_csrf'], $csrfToken)
    ) {
        $errors[] = 'La solicitud expiró. Recargá la página e intentá nuevamente.';
    }

    // Validar campos obligatorios.
    if ($old['first_name'] === '') {
        $errors[] = 'Ingresá tu nombre.';
    }

    if ($old['last_name'] === '') {
        $errors[] = 'Ingresá tu apellido.';
    }

    if (!preg_match('/^[a-zA-Z0-9_.-]{4,30}$/', $old['username'])) {
        $errors[] = 'El usuario debe tener entre 4 y 30 caracteres: letras, números, punto, guion o guion bajo.';
    }

    if (!filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Ingresá un correo electrónico válido.';
    }

    if (strlen($password) < 8) {
        $errors[] = 'La contraseña debe tener al menos 8 caracteres.';
    }

    if ($password !== $passwordConfirmation) {
        $errors[] = 'Las contraseñas no coinciden.';
    }

    // Comprobar duplicados en el almacenamiento temporal.
    foreach ($_SESSION['demo_users'] as $user) {
        if (strcasecmp($user['username'], $old['username']) === 0) {
            $errors[] = 'Ese nombre de usuario ya está registrado.';
            break;
        }

        if (strcasecmp($user['email'], $old['email']) === 0) {
            $errors[] = 'Ese correo electrónico ya está registrado.';
            break;
        }
    }

    // Registrar la cuenta de demostración.
    if (empty($errors)) {
        $_SESSION['demo_users'][] = [
            'id' => bin2hex(random_bytes(8)),
            'first_name' => $old['first_name'],
            'last_name' => $old['last_name'],
            'username' => $old['username'],
            'email' => $old['email'],
            'password_hash' => password_hash($password, PASSWORD_DEFAULT),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        // Evitar reutilizar el token del formulario enviado.
        $_SESSION['register_csrf'] = bin2hex(random_bytes(32));

        $_SESSION['register_success'] =
            'La cuenta de demostración se creó correctamente. Ya podés volver al inicio de sesión.';

        header('Location: /register.php');
        exit;
    }
}

$success = $_SESSION['register_success'] ?? '';
unset($_SESSION['register_success']);

require $root . '/app/views/admin/auth/register.php';
