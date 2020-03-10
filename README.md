# proyectoSoftware
Tópicos Especiales en Ingeniería de Software - Universidad EAFIT
# Autores
Alejandro Cano Múnera,
Luis Javier Palacio Mesa, 
Sebastián Giraldo Gómez.

# Setup
1. Abrir XAMPP y activar Apache y MySQL

2. Ir a http://localhost/phpmyadmin/

3. Crear una base de datos llamada "proyectosoftware"
Nota: Modificar el archivo .env para modificar la contraseña en caso de ser necesario

4. Realizar las migraciones en el directorio raíz del proyecto
php artisan migrate
php artisan storage:link

Nota: Si se presenta algún error con el comando anterior, correr el siguiente comando
composer dumpautoload

5. Generar los datos falsos en la base de datos con el siguiente comando
php artisan db:seed

6. Iniciar el proyecto con el comando
php artisan serve

7. La ruta inicial del proyecto es:
http://localhost:8000/
Nota: En caso de que el proyecto este en htdocs la ruta inicial del proyecto es:
http://localhost/proyectoSoftware/public/
