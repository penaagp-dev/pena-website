
## About 
PENA PROFILE V2

#### Installation
copy and paste in your terminal

```bash
git clone https://github.com/penaagp-dev/Pena-Profile
```

install composer

```bash
composer install
```
install node package

```bash
npm install
```


generate key

```bash
php artisan key:generate
```

### Migration table and seeder

```bash
php artisan migrate:fresh --seed
```

### Run Project

```bash
php artisan serve
```

```bash
npm run dev
```


## If you using docker run this command

```bash
docker-compose up -d
```

Enable this code in `vite.config.js`

```bash
 server: {
        host: '0.0.0.0',
        port: 5173
    }
```
