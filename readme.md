# City Farmac

Sitio web para una cadena de farmacias y perfumerías, desarrollado con PHP, HTML, CSS, JavaScript y Bootstrap 5.

El proyecto busca ofrecer una interfaz para consultar productos de farmacia, perfumería, belleza y cuidado personal, además de contemplar un panel administrativo para la gestión de los recursos del sitio.

Actualmente, el desarrollo está enfocado en la maquetación de las vistas, la navegación entre páginas y la presentación de datos de ejemplo.

## Tecnologías utilizadas

- **PHP 8+:** renderizado de páginas y preparación de datos.
- **HTML5:** estructura semántica.
- **CSS3:** personalización de estilos.
- **Bootstrap 5:** componentes visuales y diseño responsive.
- **JavaScript:** interacciones del lado del cliente.
- **Laragon / XAMPP:** entorno de desarrollo local.

## Estructura del proyecto

```text
city_farm/
│
├── app/
│   ├── data/
│   │   ├── brands.php
│   │   ├── categories.php
│   │   ├── comments.php
│   │   ├── products.php
│   │   ├── profiles.php
│   │   └── users.php
│   │
│   ├── helpers/
│   │
│   └── views/
│       ├── admin/
│       │   ├── auth/
│       │   │   ├── login.php
│       │   │   └── register.php
│       │   ├── brands/
│       │   │   ├── form.php
│       │   │   └── index.php
│       │   ├── categories/
│       │   │   ├── form.php
│       │   │   └── index.php
│       │   ├── comments/
│       │   │   └── index.php
│       │   ├── dashboard/
│       │   │   └── index.php
│       │   ├── products/
│       │   │   ├── form.php
│       │   │   └── index.php
│       │   ├── profiles/
│       │   │   ├── form.php
│       │   │   └── index.php
│       │   └── users/
│       │       ├── form.php
│       │       └── index.php
│       │
│       ├── partials/
│       │   ├── admin/
│       │   │   ├── footer.php
│       │   │   ├── header.php
│       │   │   └── sidebar.php
│       │   └── public/
│       │       ├── contact_form.php
│       │       ├── footer.php
│       │       ├── header.php
│       │       ├── navbar.php
│       │       └── product_card.php
│       │
│       └── public/
│           ├── contact/
│           │   └── index.php
│           ├── errors/
│           │   └── 404.php
│           ├── home/
│           │   └── index.php
│           └── products/
│               ├── detail.php
│               └── index.php
│
├── config/
│
├── public/
│   ├── assets/
│   │   ├── css/
│   │   │   ├── admin.css
│   │   │   ├── global.css
│   │   │   └── public.css
│   │   ├── img/
│   │   │   ├── banners/
│   │   │   ├── categories/
│   │   │   ├── logo/
│   │   │   └── products/
│   │   └── js/
│   │
│   ├── detail.php
│   ├── index.php
│   └── login.php
│
├── .gitignore
└── README.md
```

> El árbol refleja los archivos y directorios identificados durante el desarrollo. Algunas carpetas, como `helpers/`, `config/` y `assets/js/`, todavía pueden estar vacías o pendientes de implementación.

## Organización del proyecto

### `app/data/`

Contiene los datos de ejemplo utilizados para representar la información de la aplicación.

- `products.php`: productos, precios, descripciones, imágenes y calificaciones.
- `brands.php`: marcas de los productos.
- `categories.php`: categorías y subcategorías.
- `comments.php`: comentarios y calificaciones de los clientes.
- `users.php`: usuarios de ejemplo.
- `profiles.php`: perfiles de usuario.

Estos archivos permiten desarrollar la interfaz sin depender todavía de una base de datos.

### `app/views/public/`

Contiene las vistas del sitio público.

- **`home/index.php`:** portada y presentación de City Farmac.
- **`products/index.php`:** catálogo, filtros y ordenamiento.
- **`products/detail.php`:** información completa del producto y sus comentarios.
- **`contact/index.php`:** sección de contacto.
- **`errors/404.php`:** vista para recursos no encontrados.

### `app/views/admin/`

Agrupa las vistas previstas para el panel administrativo.

- `auth/`: inicio de sesión y registro.
- `dashboard/`: panel principal.
- `brands/`: listado y formulario de marcas.
- `categories/`: listado y formulario de categorías.
- `products/`: listado y formulario de productos.
- `comments/`: gestión de comentarios.
- `users/`: gestión de usuarios.
- `profiles/`: gestión de perfiles.

La presencia de estas vistas no implica que todas las operaciones administrativas estén implementadas.

### `app/views/partials/`

Contiene componentes reutilizables para evitar duplicar estructuras.

**Componentes públicos:**

- `header.php`
- `navbar.php`
- `footer.php`
- `product_card.php`
- `contact_form.php`

**Componentes administrativos:**

- `header.php`
- `sidebar.php`
- `footer.php`

### `public/`

Es el directorio destinado a los archivos accesibles desde el navegador.

- `index.php`: punto de entrada de la página principal.
- `detail.php`: punto de entrada para consultar un producto mediante su identificador.
- `login.php`: punto de entrada para la vista de autenticación.
- `assets/css/`: hojas de estilo.
- `assets/js/`: scripts del lado del cliente.
- `assets/img/`: imágenes del proyecto.

### `config/` y `app/helpers/`

Se reservan para centralizar configuraciones y funciones auxiliares, como la gestión de rutas y otros recursos comunes, a medida que avance el desarrollo.

## Funcionalidades contempladas

### Sitio público

- Página de inicio con productos destacados.
- Catálogo de productos.
- Filtro por marca y categoría.
- Ordenamiento por destacados, calificación y nombre.
- Detalle individual de cada producto.
- Visualización de comentarios y calificaciones.
- Formulario para enviar comentarios.
- Formulario de contacto.
- Navegación entre las secciones públicas.

### Panel administrativo

- Pantallas de inicio de sesión y registro.
- Dashboard administrativo.
- Vistas de productos, marcas y categorías.
- Vistas de comentarios.
- Vistas de usuarios y perfiles.

## Próximas funcionalidades por desarrollar

- [ ] **Botón para limpiar filtros:** restablecer los filtros del catálogo y recuperar el listado completo de productos.
- [ ] **Página 404:** completar la presentación y el acceso a la vista de error para rutas o productos inexistentes.
- [ ] **Organización de JavaScript:** separar los scripts por responsabilidad y ubicarlos correctamente en `public/assets/js/`.
- [ ] **Página de registro:** completar la maquetación y navegación de la pantalla de registro.
- [ ] **Dashboard administrativo:** desarrollar la interfaz principal con indicadores y accesos a las secciones de gestión.
- [ ] **Navegación administrativa:** conectar los enlaces del panel con sus respectivas vistas.
- [ ] **Validación de formularios:** agregar validaciones del lado del cliente y, cuando corresponda, del lado del servidor.
- [ ] **Persistencia de datos:** evaluar e implementar la conexión con una base de datos cuando corresponda a los requisitos del proyecto.
- [ ] **Configuración de rutas:** unificar la generación de enlaces y recursos para que funcionen correctamente en Laragon y XAMPP.

## Instalación y ejecución local

### Requisitos

- PHP 8 o superior.
- Laragon o XAMPP.
- Navegador web moderno.
- Conexión a Internet para cargar Bootstrap desde CDN.

### Con Laragon

1. Colocar el proyecto en `C:\laragon\www\city_farmar\`.
2. Iniciar Apache desde Laragon.
3. Configurar la raíz web del sitio para que apunte a la carpeta `public/`.
4. Abrir la página principal en el navegador.

URL prevista:

```text
http://city_farmar.test/
```

Detalle de un producto:

```text
http://city_farmar.test/detail.php?id=1
```

### Con XAMPP

1. Copiar el proyecto a `C:\xampp\htdocs\city_farm\`.
2. Iniciar Apache desde XAMPP.
3. Abrir la aplicación desde la carpeta pública.

URL de ejemplo:

```text
http://localhost/city_farmar/public/
```

Detalle de un producto:

```text
http://localhost/city_farm/public/detail.php?id=1
```

**Importante:** las rutas de CSS, JavaScript e imágenes deben coincidir con la raíz web configurada. Si la aplicación se ejecuta bajo un subdirectorio, será necesario adaptar las rutas o configurar un VirtualHost que utilice `public/` como raíz.

## Estado del proyecto

El proyecto se encuentra en desarrollo. Actualmente se está trabajando en la maquetación de las vistas públicas, el catálogo, el detalle de los productos y la estructura inicial del panel administrativo.

Las funcionalidades pendientes se incorporarán progresivamente, manteniendo la separación entre datos, puntos de entrada, vistas y componentes reutilizables.

## Objetivo

Desarrollar una aplicación web organizada, responsive y mantenible, aplicando buenas prácticas de separación de responsabilidades y preparando la estructura para incorporar funcionalidades completas de administración y persistencia de datos.
