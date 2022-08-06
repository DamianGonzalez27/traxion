# Proyecto de prueba técnica para traxion

Este proyecto esta construido con el framework PHP laravel en su version 8, tiene una implementación con docker para la construcción de una imágen que pueda ser desplegada en un entorno de desarrollo, testing y producción.

Para la puesta en marcha de proyecto se crea un fichero Makefile a forma de script con diferentes comandos útiles para simplificar el proceso de la compilación de las imágenes `Docker` y ayudar a gestionar de una forma efectiva los contenedores generados.

Se generan imagenes `Docker` administradas por `Docker compose` para la puesta en producción de la aplicación.

La base de datos usada para el proyecto es MySQL, para las conexiones en un entorno de producción es importante que las conexiones sean gestionadas desde una base de datos cloud ya sea un `RDS de AWS` o una instancia especializada de `Digital Ocean`.

El entorno de desarrollo puede ser ejecutado directamente con `Docker` o con el servidor de laravel con el comando de `php artisan serve` desde la raíz del proyecto.
