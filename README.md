## API RESOURCE

Menginstal project laravel baru
```
composer create-project --prefer-dist laravel/laravel laravel10-api
```

Menjalankan project laravel
```
php artisan serve
```

Membuat link dan folder storage
```
php artisan storage:link
```

Membuat php resource
```
php artisan make:resource PostResource
php artisan make:resource EventResource
```

Membuat model
```
php artisan make:model Post -m
php artisan make:model Event -m
```

Generate table ke dalam database

```
php artisan migrate
```

Membuat kontroller baru
```
php artisan make:controller Api/PostController
php artisan make:controller Api/EventController
```

Menampilkan daftar routes
```
php artisan route:list
```

## Sumber Belajar

Web : https://santrikoding.com/tutorial-set/tutorial-restful-api-laravel-10?from=live-search
Youtube : https://www.youtube.com/playlist?list=PL-2rLYVN9WCzEe1v7JaXuq4XIkqZdLHpy

Youtube Playlist : https://www.youtube.com/playlist?list=PL-2rLYVN9WCzEe1v7JaXuq4XIkqZdLHpy
