## Book Online System

#### Set up Instructions

1. Clone The Repo 
2. Install Composer `composer install`
3. Install npm Modules `npm install`
4. Compile The npm Modules `npm run dev`
5. Copy The `.env.example` to `.env`
6. Generate App Key `php artisan key:generate`
7. Generate The Storage Link `php artisan storage:link`
8. Change The `APP_URL` to `local.kl-jamm.com` for local
9. Change The Database Keys to Match Your local Database


#### Git Branch Structure

1. develop

```
  The branch will be used during the development phase. Once you finish working on a new feature and it's fully tested, then you can push to the develop branch.
```

2. master

```
  The branch will only be used for the stable version of the website.
```



