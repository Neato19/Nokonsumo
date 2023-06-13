## Instalación

Primero clona este repositorio, instala las dependencias, y configura tu fichero .env

```
git clone git@github.com:Neato19/Nokonsumo.git nokonsumo
composer install
cp .env.example .env
```

Crea la base de datos

```
php artisan db
create database blog
```

Y ejecuta las migraciones y seeders

```
php artisan migrate --seed
```
