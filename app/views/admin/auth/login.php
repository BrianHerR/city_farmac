<?php

declare(strict_types=1);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Iniciar sesión | City Farmac</title>

    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <!-- Estilos propios -->
    <link rel="stylesheet" href="/assets/css/public.css">
</head>

<body class="bg-light">

    <main class="min-vh-100 d-flex align-items-center justify-content-center py-5">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-12 col-sm-10 col-md-7 col-lg-5 col-xl-4">

                    <div class="card border-0 shadow rounded-4">

                        <div class="card-body p-4 p-md-5">

                            <!-- Logo -->
                            <div class="text-center mb-4">

                                <a href="/index.php#inicio"
                                    class="d-inline-block mb-3">

                                    <img
                                        src="/assets/img/logo/logo.png"
                                        alt="City Farmac"
                                        class="img-fluid"
                                        style="max-width: 190px; max-height: 90px;">

                                </a>

                                <h1 class="h3 fw-bold mb-2">
                                    ¡Bienvenido!
                                </h1>

                                <p class="text-secondary mb-0">
                                    Ingresá a tu cuenta de City Farmac.
                                </p>

                            </div>

                            <!-- Formulario de acceso -->
                            <form action="#" method="post">

                                <div class="mb-3">

                                    <label for="email" class="form-label">
                                        Correo electrónico
                                    </label>

                                    <input
                                        type="email"
                                        class="form-control form-control-lg"
                                        id="email"
                                        name="email"
                                        placeholder="nombre@ejemplo.com"
                                        autocomplete="email"
                                        required>

                                </div>

                                <div class="mb-3">

                                    <label for="password" class="form-label">
                                        Contraseña
                                    </label>

                                    <div class="input-group input-group-lg">

                                        <input
                                            type="password"
                                            class="form-control"
                                            id="password"
                                            name="password"
                                            placeholder="Ingresá tu contraseña"
                                            autocomplete="current-password"
                                            required>

                                        <button
                                            class="btn btn-outline-secondary"
                                            type="button"
                                            id="togglePassword"
                                            aria-label="Mostrar contraseña"
                                            aria-pressed="false">
                                            Ver
                                        </button>

                                    </div>

                                </div>

                                <div class="d-flex justify-content-between align-items-center mb-4">

                                    <div class="form-check">

                                        <input
                                            class="form-check-input"
                                            type="checkbox"
                                            id="remember"
                                            name="remember">

                                        <label class="form-check-label small"
                                            for="remember">
                                            Recordarme
                                        </label>

                                    </div>

                                    <a href="#recuperar"
                                        class="small text-success text-decoration-none">
                                        ¿Olvidaste tu contraseña?
                                    </a>

                                </div>

                                <div class="d-grid">

                                    <button
                                        type="submit"
                                        class="btn btn-success btn-lg">
                                        Iniciar sesión
                                    </button>

                                </div>

                            </form>

                            <!-- Registro -->
                            <div class="text-center mt-4">

                                <p class="text-secondary mb-2">
                                    ¿Todavía no tenés una cuenta?
                                </p>

                                <a href="#registro"
                                    class="fw-semibold text-success text-decoration-none">
                                    Crear una cuenta
                                </a>

                            </div>

                            <!-- Volver al sitio -->
                            <div class="text-center mt-4 pt-3 border-top">

                                <a href="/index.php#inicio"
                                    class="text-secondary text-decoration-none small">
                                    &larr; Volver a City Farmac
                                </a>

                            </div>

                        </div>

                    </div>

                    <p class="text-center text-secondary small mt-4">
                        &copy; <?= date('Y') ?> City Farmac.
                        Todos los derechos reservados.
                    </p>

                </div>

            </div>

        </div>

    </main>

    <!-- despues ordenar en el archivo js -->
    <script>
        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('togglePassword');

        togglePassword.addEventListener('click', () => {
            const isPassword = passwordInput.type === 'password';

            passwordInput.type = isPassword ? 'text' : 'password';
            togglePassword.textContent = isPassword ? 'Ocultar' : 'Ver';
            togglePassword.setAttribute(
                'aria-label',
                isPassword ? 'Ocultar contraseña' : 'Mostrar contraseña'
            );
            togglePassword.setAttribute('aria-pressed', String(isPassword));
        });
    </script>

</body>

</html>