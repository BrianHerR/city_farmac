# City Farmac

Proyecto web para la cadena de farmacias y perfumerías **City Farmac**.

El proyecto será desarrollado utilizando PHP, HTML, CSS y JavaScript.
Actualmente el repositorio contiene únicamente la estructura inicial del proyecto.

---

## Estructura del proyecto

```text
city_farmac/
│
├── app/
│   ├── data/
│   │
│   └── views/
│       ├── admin/
│       │   ├── auth/
│       │   ├── brands/
│       │   ├── categories/
│       │   ├── comments/
│       │   ├── dashboard/
│       │   ├── products/
│       │   ├── profiles/
│       │   └── users/
│       │
│       ├── layouts/
│       │
│       ├── partials/
│       │   ├── admin/
│       │   ├── public/
│       │   └── shared/
│       │
│       └── public/
│           ├── contact/
│           ├── errors/
│           ├── home/
│           └── products/
│
├── config/
│
└── public/
    └── assets/
        ├── css/
        ├── img/
        └── js/
```

## Descripción de las carpetas

# app/

Contiene los componentes internos de la aplicación.

Esta carpeta concentra principalmente los datos de ejemplo y las vistas que serán utilizadas para construir tanto el sitio público como el panel administrativo.

# app/data/

Contendrá los datos utilizados por la aplicación durante la etapa de maquetación.

En esta primera instancia se utilizarán datos de ejemplo, ya que todavía no se implementará una base de datos.

Posteriormente, esta parte podrá ser reemplazada por el acceso a datos provenientes de la base de datos.

# app/views/

Contiene todas las vistas de la aplicación.

Las vistas se encuentran organizadas en diferentes grupos para separar el sitio público, el panel administrativo y los componentes reutilizables.

# app/views/admin/

Contendrá las vistas correspondientes al panel administrativo de City Farmac.

Las diferentes carpetas representan las distintas secciones que tendrá el panel:

auth/ → autenticación y acceso al panel.
brands/ → gestión de marcas.
categories/ → gestión de categorías y subcategorías.
comments/ → gestión de comentarios.
dashboard/ → página principal del panel administrativo.
products/ → gestión de productos.
profiles/ → gestión de perfiles.
users/ → gestión de usuarios.
app/views/layouts/

Contendrá las estructuras generales utilizadas por las diferentes partes de la aplicación.

Se utilizarán layouts independientes para mantener separada la estructura del sitio público de la estructura del panel administrativo.

Esto permitirá reutilizar una misma estructura general en múltiples vistas sin duplicar código.

# app/views/partials/

Contendrá componentes de interfaz reutilizables.

Se divide en tres grupos:

# admin/

Componentes reutilizables específicos del panel administrativo.

# public/

Componentes reutilizables específicos del sitio público.

# shared/

Componentes que podrán utilizarse tanto en el sitio público como en el panel administrativo.

# app/views/public/

Contendrá las vistas correspondientes al sitio público de City Farmac.

Las diferentes secciones se encuentran organizadas en:

contact/ → sección de contacto.
errors/ → páginas relacionadas con errores.
home/ → página principal.
products/ → listado y visualización de productos.
config/

Contendrá la configuración general de la aplicación.

Esta carpeta permitirá centralizar configuraciones necesarias para que el proyecto pueda ejecutarse correctamente en diferentes entornos.

# public/

Es la parte pública de la aplicación y será la carpeta utilizada por el servidor web.

La aplicación estará preparada para que los recursos internos ubicados dentro de app/ y config/ no sean expuestos directamente al navegador.

# public/assets/

Contendrá todos los recursos estáticos utilizados por la interfaz.

Se divide en:

# css/

Contendrá las hojas de estilos utilizadas para definir la apariencia visual del proyecto.

# img/

Contendrá las imágenes utilizadas por el sitio y el panel administrativo.

# js/

Contendrá los scripts JavaScript utilizados para agregar comportamiento e interacción a las interfaces.

Estado actual del proyecto

Actualmente el proyecto se encuentra en la etapa inicial de organización de la estructura de carpetas.

Las funcionalidades, vistas y componentes serán desarrollados progresivamente.

La estructura fue organizada desde el comienzo para facilitar:

reutilización de componentes;
separación entre sitio público y panel administrativo;
mantenimiento del código;
incorporación posterior de una base de datos;
desarrollo progresivo del proyecto.