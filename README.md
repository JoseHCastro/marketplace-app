## Instrucciones

### 1. Instalación
Instrucciones para instalar y configurar el proyecto.
Primero configuren su archivo .env
```bash

#Composer
composer update o composer install

#key
php artisan key:generate

# Migrar tablas y seeders
php artisan migrate:fresh --seed



# Para correr el proyecto
php artisan serve
