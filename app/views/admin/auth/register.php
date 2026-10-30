<?php

declare(strict_types=1);

function registerEscape(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta
        name="description"
        content="Creá tu cuenta en City Farmac.">

    <title>Crear cuenta | City Farmac</title>

    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Estilos generales -->
    <link rel="stylesheet" href="/assets/css/public.css">
</head>

<body class="bg-light">

    <main class="container py-5">

        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">

                <!-- Encabezado -->
                <div class="text-center mb-4">

                    <a href="/#inicio" class="text-decoration-none">
                        <img
                            src="/assets/img/logo/logo.png"
                            alt="City Farmac"
                            class="img-fluid mb-3"
                            style="max-width: 190px; max-height: 90px; object-fit: contain;">
                    </a>

                    <h1 class="h2 fw-bold mb-2">
                        Crear una cuenta
                    </h1>

                    <p class="text-secondary mb-0">
                        Unite a la comunidad de City Farmac.
                    </p>

                </div>

                <!-- Formulario -->
                <div class="card border-0 shadow-sm rounded-4">
                    <div class="card-body p-4 p-md-5">

                        <?php if (!empty($success)): ?>
                            <div class="alert alert-success" role="status">
                                <?= registerEscape($success) ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($errors)): ?>
                            <div class="alert alert-danger" role="alert">
                                <p class="fw-semibold mb-2">
                                    Revisá los siguientes campos:
                                </p>

                                <ul class="mb-0">
                                    <?php foreach ($errors as $error): ?>
                                        <li><?= registerEscape($error) ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <form action="/register.php" method="post">

                            <input
                                type="hidden"
                                name="csrf_token"
                                value="<?= registerEscape($_SESSION['register_csrf']) ?>">

                            <div class="row g-3">

                                <!-- Nombre -->
                                <div class="col-12 col-md-6">
                                    <label for="first_name" class="form-label">
                                        Nombre
                                    </label>

                                    <input
                                        type="text"
                                        id="first_name"
                                        name="first_name"
                                        class="form-control"
                                        value="<?= registerEscape($old['first_name'] ?? '') ?>"
                                        autocomplete="given-name"
                                        maxlength="80"
                                        required>
                                </div>

                                <!-- Apellido -->
                                <div class="col-12 col-md-6">
                                    <label for="last_name" class="form-label">
                                        Apellido
                                    </label>

                                    <input
                                        type="text"
                                        id="last_name"
                                        name="last_name"
                                        class="form-control"
                                        value="<?= registerEscape($old['last_name'] ?? '') ?>"
                                        autocomplete="family-name"
                                        maxlength="80"
                                        required>
                                </div>

                                <!-- Usuario -->
                                <div class="col-12">
                                    <label for="username" class="form-label">
                                        Nombre de usuario
                                    </label>

                                    <input
                                        type="text"
                                        id="username"
                                        name="username"
                                        class="form-control"
                                        value="<?= registerEscape($old['username'] ?? '') ?>"
                                        minlength="4"
                                        maxlength="30"
                                        pattern="[a-zA-Z0-9_.-]{4,30}"
                                        autocomplete="username"
                                        aria-describedby="usernameHelp"
                                        required>

                                    <div id="usernameHelp" class="form-text">
                                        Entre 4 y 30 caracteres: letras, números, punto,
                                        guion o guion bajo.
                                    </div>
                                </div>

                                <!-- Correo -->
                                <div class="col-12">
                                    <label for="email" class="form-label">
                                        Correo electrónico
                                    </label>

                                    <input
                                        type="email"
                                        id="email"
                                        name="email"
                                        class="form-control"
                                        value="<?= registerEscape($old['email'] ?? '') ?>"
                                        autocomplete="email"
                                        maxlength="254"
                                        required>
                                </div>

                                <!-- Contraseña -->
                                <div class="col-12">
                                    <label for="password" class="form-label">
                                        Contraseña
                                    </label>

                                    <input
                                        type="password"
                                        id="password"
                                        name="password"
                                        class="form-control"
                                        minlength="8"
                                        autocomplete="new-password"
                                        aria-describedby="passwordHelp"
                                        required>

                                    <div id="passwordHelp" class="form-text">
                                        Debe contener al menos 8 caracteres.
                                    </div>
                                </div>

                                <!-- Confirmación -->
                                <div class="col-12">
                                    <label
                                        for="password_confirmation"
                                        class="form-label">
                                        Confirmar contraseña
                                    </label>

                                    <input
                                        type="password"
                                        id="password_confirmation"
                                        name="password_confirmation"
                                        class="form-control"
                                        minlength="8"
                                        autocomplete="new-password"
                                        required>
                                </div>

                                <!-- Términos -->
                                <div class="col-12">
                                    <div class="form-check">
                                        <input
                                            type="checkbox"
                                            id="terms"
                                            name="terms"
                                            class="form-check-input"
                                            required>

                                        <label for="terms" class="form-check-label">
                                            Acepto los términos y condiciones.
                                        </label>
                                    </div>
                                </div>

                                <!-- Botón -->
                                <div class="col-12 pt-2">
                                    <button
                                        type="submit"
                                        class="btn btn-success btn-lg w-100">
                                        Crear cuenta
                                    </button>
                                </div>

                            </div>

                        </form>

                        <div class="text-center mt-4">
                            <span class="text-secondary">
                                ¿Ya tenés una cuenta?
                            </span>

                            <a
                                href="/login.php"
                                class="link-success fw-semibold text-decoration-none">
                                Iniciar sesión
                            </a>
                        </div>

                    </div>
                </div>

                <p class="text-center text-secondary small mt-4">
                    City Farmac · Salud siempre contigo
                </p>

            </div>
        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const password = document.getElementById('password');
        const confirmation = document.getElementById('password_confirmation');

        function validatePasswords() {
            confirmation.setCustomValidity(
                confirmation.value !== password.value ?
                'Las contraseñas no coinciden.' :
                ''
            );
        }

        password.addEventListener('input', validatePasswords);
        confirmation.addEventListener('input', validatePasswords);
    </script>

</body>

</html>