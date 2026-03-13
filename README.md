# oficina
Prueba Técnica

Instalación del proyecto

1- clonar el repositorio
git clone https://github.com/sudo-ItsEmma/oficina.git

2- acceder al directorio
cd oficina

3- instalar dependencias de PHP
composer install

4- generar la clave de la aplicacion
cp .env.example .env

5- abrir el archivo .env y configurar la base de datos
DB_DATABASE=oficinaDb

6- importar la base de datos desde el archivo .sql

7- instalar dependencias frontend
npm install

8- compilar los recursos del proyecto
npm run dev

9- iniciar el servidor de desarrollo
php artisan serve


Funcionalidades principales
	•	Registro de artículos de oficina
	•	Edición de productos
	•	Eliminación de productos
	•	Control de stock
	•	Activación o desactivación de artículos
	•	Búsqueda de productos en tiempo real