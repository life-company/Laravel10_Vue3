# 環境情報
- Laravel10
- PHP 8.2.10
- node 18.18.2

# 環境構築
## 簡易版(MAMPなど)
- git clone https://github.com/life-company/Laravel10_Vue3.git
- cp .env.local .env
- composer install
- php artisan key:generate
- php artisan migrate
- npm install
- npm run dev
