======================= DOKUMENTASI INSTALASI PROJECT =======================

## Windows User
### Download dan Install MongoDB 
1. [Download dan Install Mongo DB Server (4.2)]: https://www.mongodb.com/try/download/community

2. [Download Mongo DB Shell dan Compass]: https://www.mongodb.com/try/download/shell

### Download dan Install Xampp
1. [Download Xampp]: https://www.apachefriends.org/download.html

### Donwload MongoDB Driver
1. [Download php_mongodb.dll, download yang versi stable]: https://pecl.php.net/package/mongodb/1.7.3/windows

2. Extract dan Copas File php_mongodb.dll ke dalam directory C:xampp/php/ext dan tambahkan kode berikut pada file php.ini
```js
extension=php_mongodb.dll
```

3. Restart Xampp Service

## Linux User
### Download and Install MongoDB
1. Import Public CPG key untuk versi stabil mongoDB
```js
curl -fsSL https://www.mongodb.org/static/pgp/server-4.2.asc | sudo apt-key add -
```

2. Jalankan Command dibawah ini
```js
echo "deb [ arch=amd64,arm64 ] https://repo.mongodb.org/apt/ubuntu focal/mongodb-org/4.2 multiverse" | sudo tee /etc/apt/sources.list.d/mongodb-org-4.2.list
```

3. Update Local Package
```js
sudo apt update
```

4. Install MongoDB
```js
sudo apt install mongodb-org
// or
sudo apt-get install -y mongodb
```

[### Download and Install LAMP]: https://www.digitalocean.com/community/tutorials/how-to-install-linux-apache-mysql-php-lamp-stack-ubuntu-18-04

### Install MongoDB package
1. Run command
```js
sudo pecl install mongodb
```

2. Tambahkan kode berikut di dalam php.ini pada direktori /etc/php/8.0/fpm/php.ini
```js
extension=mongodb.so
```

3. Restart service
```js
service php8.0-fpm restart
```

## Backend

1. Clone Project
```js
git clone https://github.com/dimascapella/inosoft.git
```

2. Masuk Folder Proejk dan Lakukan Install Dependencies
```js
composer install --ignore-platform-reqs
```

3. Copas .env.example dan Ubah Nama menjadi .env

4. Publish Config
```js
php artisan vendor:publish --provider="Tymon\JWTAuth\Providers\LaravelServiceProvider"
```

5. Generate Secret Key
```js
php artisan jwt:secret
```