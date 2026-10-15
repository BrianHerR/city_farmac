<section class="py-5 bg-light" id="contacto">

    <div class="container py-lg-4">

        <!-- Encabezado -->
        <div class="text-center mb-5">

            <p class="text-success fw-bold text-uppercase mb-2">
                Estamos para ayudarte
            </p>

            <h2 class="display-6 fw-bold mb-3">
                Contactanos
            </h2>

            <p class="text-secondary mx-auto" style="max-width: 600px;">
                Dejanos tu consulta y nuestro equipo te orientará.
                Estamos para ayudarte con tus dudas sobre nuestros productos
                y servicios.
            </p>

        </div>

        <!-- Formulario -->
        <div class="row justify-content-center">

            <div class="col-12 col-lg-8 col-xl-7">

                <div class="card border-0 shadow-sm rounded-4">

                    <div class="card-body p-4 p-md-5">

                        <form action="#" method="post">

                            <!-- Nombre y apellido -->
                            <div class="row g-3 mb-3">

                                <div class="col-12 col-md-6">
                                    <label for="name" class="form-label">
                                        Nombre
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        id="name"
                                        name="name"
                                        autocomplete="given-name"
                                        required>
                                </div>

                                <div class="col-12 col-md-6">
                                    <label for="surname" class="form-label">
                                        Apellido
                                    </label>

                                    <input
                                        type="text"
                                        class="form-control"
                                        id="surname"
                                        name="surname"
                                        autocomplete="family-name"
                                        required>
                                </div>

                            </div>

                            <!-- Correo -->
                            <div class="mb-3">

                                <label for="email" class="form-label">
                                    Correo electrónico
                                </label>

                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    autocomplete="email"
                                    placeholder="nombre@ejemplo.com"
                                    required>

                            </div>

                            <!-- Teléfono y área -->
                            <div class="row g-3 mb-3">

                                <div class="col-12 col-md-6">

                                    <label for="phone" class="form-label">
                                        Teléfono
                                    </label>

                                    <input
                                        type="tel"
                                        class="form-control"
                                        id="phone"
                                        name="phone"
                                        autocomplete="tel"
                                        required>

                                </div>

                                <div class="col-12 col-md-6">

                                    <label for="area" class="form-label">
                                        Área de contacto
                                    </label>

                                    <select
                                        class="form-select"
                                        id="area"
                                        name="area"
                                        required>
                                        <option value="" selected disabled>
                                            Seleccioná un área
                                        </option>

                                        <option value="ventas">
                                            Ventas
                                        </option>

                                        <option value="atencion">
                                            Atención al cliente
                                        </option>

                                        <option value="farmacia">
                                            Farmacia
                                        </option>

                                        <option value="otro">
                                            Otro
                                        </option>
                                    </select>

                                </div>

                            </div>

                            <!-- Consulta -->
                            <div class="mb-4">

                                <label for="message" class="form-label">
                                    Tu consulta
                                </label>

                                <textarea
                                    class="form-control"
                                    id="message"
                                    name="message"
                                    rows="5"
                                    placeholder="Contanos cómo podemos ayudarte..."
                                    required></textarea>

                            </div>

                            <!-- Envío -->
                            <div class="d-grid">

                                <button
                                    class="btn btn-success btn-lg"
                                    type="submit">
                                    Enviar consulta
                                </button>

                            </div>

                            <p class="text-secondary small text-center mt-3 mb-0">
                                Formulario de demostración: no envía ni guarda
                                información.
                            </p>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>