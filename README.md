## InstallationInstrucciones de instalación y ejecución
Para poder ejecutar este proyecto en su equipo local, siga los siguientes pasos:

## Instale un entorno de desarrollo en su equipo que incluya PHP y una base de datos. Algunas opciones populares son XAMPP, WAMP o MAMP.
## Descargue e instale Composer, el administrador de paquetes de PHP.
## Clone el repositorio del proyecto en Laravel desde GitHub o descargue el archivo ZIP del proyecto y descomprímalo en su equipo.
## Abra una terminal dentro del proyecto y ejecute los siguientes comandos:
```bash
composer install
cp .env.example .env
php artisan key:generate
```
## Cree una base de datos en su sistema de gestión de bases de datos (como MySQL) y agregue su nombre al archivo .env del proyecto:
```makefile
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=[Nombre de la base de datos]
DB_USERNAME=root
DB_PASSWORD=
```

## Ejecute el comando php artisan migrate en la terminal para crear las tablas necesarias en la base de datos especificada.
```bash
php artisan migrate
```
## Ejecute el comando php artisan serve en la terminal para iniciar el servidor local de Laravel. Esto permitirá ver la aplicación en su navegador web en la dirección http://localhost:8000.

```bash
php artisan serve
http://localhost:8000
```
¡Listo! Ahora puede explorar y usar la aplicación.
