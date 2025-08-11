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
# Menginstall Dependecnies PHP
composer install

#Menginstall Dependencies Node.js
npm install
```

### 3. Generate API Key
```bash
# Membuat file .env
cp .env.example .env

#Mengenerate API Key ke file .env
php artisan key:generate
```
### 4. Buat file Database
```bash
#Migrasi database
php artisan migrate:fresh --seed
```

### 5. Jalankan localhost
Jalankan command ini di terminal terpisah
```bash
#Menjalankan Server
composer run dev     # command ini memungkinkan untuk menejalankan php artisan serve dan npm run dev dalam satu waktu
```

### 6. Akses http://127.0.0.1:8000/ di browser anda


