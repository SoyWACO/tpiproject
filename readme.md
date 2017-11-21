# ¿Cómo poner en marcha el proyecto?

## Clonar el proyecto

Para clonar el proyecto utiliza el comando de git:

git clone https://github.com/WilliamCoto/tpiproject.git

## Instalar composer

En la consola ubicate en la carpeta del proyecto [tpiproject] y ejecuta la siguiente instrucción:

composer install

## Configurar archivo .env

1. Abre en tu editor de texto preferido el archivo .env.example

2. Modifica el nombre de la base de datos, nombre de usuario y contraseña si es necesario. Puedes crear una base de datos con el nombre "tpiproject" o modificarlo. El nombre de usuario y contraseña son los que trae por defecto XAMPP.

DB_DATABASE=tpiproject
DB_USERNAME=root
DB_PASSWORD=

3. Guarda los cambios.

4. Cambia el nombre del archivo .env.example a .env solamente.

## Base de datos

1. En la consola ubicate en la carpeta del proyecto [tpiproject] y ejecuta la siguiente instrucción:

php artisan migrate

2. En la carpeta tpiproject/database/mis_registros se encuentra el archivo carreras.csv con algunos registros para llenar la tabla de carreras.

NOTA: Han habido cambios importantes en algunas tablas y campos de las mismas, por lo que si tienes una versión antigua del proyecto [anterior a la fecha 21/11/2017] se recomienda hacer las migraciones en una base de datos nueva o borrar todas las tablas de tu base de datos actual y hacer nuevamente las migraciones.

## Correr la aplicación

1. Enciende el modulo de Apache y MySQL.

2. En la consola ubicate en la carpeta del proyecto [tpiproject] y ejecuta la siguiente instrucción:

php artisan serve

3. En tu navegador ingresa a:

http://localhost:8000/

## Generar llave

Si te aparece un error como "No supported encrypter found. The cipher and / or key length are invalid.", en la consola ubicate en la carpeta del proyecto [tpiproject] y ejecuta la siguiente instrucción:

php artisan key:generate

## Crear primer usuario Administrador

Puedes crear un usuario desde la aplicación en la parte de "Registro", por defecto se le asignará el tipo de usuario "Empresa", y posteriormente asignarle el tipo de usuario "Administrador" desde tu gestor de base de datos.