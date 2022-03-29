# UPTD

## Cara Menggunakan

### 1. Clone Repository
### 2. Install Composer
```cli
composer install
```
### 3. Generate Key
```cli
php artisan key:generate
```
### 4. Buat Database Baru
buat database dengan nama ```uptd```

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