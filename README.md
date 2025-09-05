### App Contactos con POO (PHP + MySQL)

Este proyecto es una aplicación para la gestión de contactos
desarrollada en PHP utilizando Programación Orientada a Objetos (POO) y
MySQL.
Permite registrar, iniciar sesión y realizar operaciones CRUD (Crear,
Leer, Actualizar y Eliminar) sobre contactos.

------------------------------------------------------------------------

##Características

-   Registro e inicio de sesión de usuarios.
-   Gestión de contactos (CRUD completo).
-   Arquitectura basada en MVC (Modelo - Vista - Controlador).
-   Conexión segura a la base de datos con PDO.
-   Uso de Composer para la carga automática de clases.

------------------------------------------------------------------------

##Estructura del proyecto

    app_contactos_con_poo/
    │── app/
    │   ├── controladores/
    │   ├── modelos/
    │   ├── vistas/
    │── public/
    │── vendor/
    │── composer.json
    │── .gitignore
    │── README.md

------------------------------------------------------------------------

##Requisitos

-   PHP >= 7.4
-   MySQL
-   Composer
-   Servidor local (XAMPP, Laragon, WAMP, etc.)

------------------------------------------------------------------------
##Instalación

1.  Clona este repositorio:

        git clone https://github.com/harleyjgb07/App_Contactos_con-POO.git

2.  Entra a la carpeta del proyecto:

        cd App_Contactos_con-POO

3.  Instala las dependencias con Composer:

        composer install

4.  Configura la base de datos en config/database.php.

5.  Importa el archivo SQL incluido en /database.

6.  Abre el proyecto en tu navegador (ejemplo:
    http://localhost/app_contactos_con_poo/public).

------------------------------------------------------------------------

##Autor

-   Harley Guerra
-   GitHub: @harleyjgb07

------------------------------------------------------------------------

