## Instrucciones

### 1. Instalación
Instrucciones para instalar y configurar el proyecto.
Primero configuren su archivo .env
```bash

#Composer
composer update

#key
php artisan key:generate

# Migrar tablas y seeders
php artisan migrate:fresh --seed

# en una consola dentro del proyecto
npm run dev

#otra consola dentro del proyecto
php artisan serve
