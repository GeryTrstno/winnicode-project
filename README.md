# Proyek Web Development Winnicode
Berikut tahapan untuk menjalankan Proyek ini di device kalian.

## Prasyarat
1. Laravel 12
2. Composer 2.8^
3. PHP 8.2^
4. Node.js

# Tahapan

### 1. Clone Repository
```bash
git clone https://github.com/GeryTrstno/winnicode-project.git
cd winnicode-project
```

### 2. Download Dependencies
```bash
composer install
npm install
```

### 3. Generate API Key
```bash
cp .env.example .env
php artisan key:generate
```
### 4. Buat file Database
```bash
touch /database/database.sqlite
php artisan migrate
```

### 5. Jalankan localhost
Jalankan command ini di terminal terpisah
```bash
composer run dev
```

### 6. Akses http://127.0.0.1:8000/ di browser anda


