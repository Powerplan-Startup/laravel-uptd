# UPTD

## Cara Menggunakan

### 1. Clone Repository
### 2. Install Package Composer
```cli
composer install
```
### 3. Generate Key
```cli
php artisan key:generate
```
### 4. Buat Database Baru & Konfigurasi .env
buat database dengan nama ```uptd```

```env
...

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=uptd
DB_USERNAME=root
DB_PASSWORD=

...
```

### 5. Migrate Database
```cli
php artisan migrate
```
### 6. Seed Database
```cli
php artisan db:seed
```
### 7. Install NPM
```cli
npm install && npm run dev
```

## Pembagian Halaman

### 1. Dashboard Admin

untuk setiap pembuatan controller baru di folder __Admin__

_contoh:_

```cli
php artisan make:controller Admin/UserController
```

### 2. Halaman Utama

untuk setiap pembuatan controller baru di folder __Public__

```cli
php artisan make:controller Public/HomeController
```

sedangkan untuk component dimulai dari nama public

contoh:
```cli
php artisan make:component PublicHeader
```

untuk public menggunakan __app.js__ dan __app.css__


untuk resource view (blade) pada folder __public__