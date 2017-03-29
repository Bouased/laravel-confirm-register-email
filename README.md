# laravel-confirm-register-email
Add confimation regisration email to Laravel project

### Installation ###

Via composer :
```
    composer require bouased/laravel-confirm-register-email
```

Add package to your composer.json file :
```
"require": {
        "php": ">=5.6.4",
        "laravel/framework": "5.4.*",
        ............................
        "bouased/laravel-confirm-register-email": "~1.0"
    },
    
    composer update
```

Add service provider to `config/app.php` :
```
    Bouased\LaravelConfirmRegisterEmail\ServiceProvider::class,
```

### Configuration ###

Change trait reference in `LoginController` :
```
    use Bouased\LaravelConfirmRegisterEmail\Traits\AuthenticatesUsers;
```

Change trait reference in `RegisterController` :
```
    use Bouased\LaravelConfirmRegisterEmail\Traits\RegistersUsers;
```

Change trait reference in `ResetPasswordController`:
```
    use Bouased\LaravelConfirmRegisterEmail\Traits\ResetsPasswords;
```

### Publish ###

Override login and register views to get confirmation alerts :
```
    php artisan confirmation:auth
```

### Optional Publish ###

If you want to do some changes or add a language you can publish translations :
```
    php artisan vendor:publish --tag=confirmation:translations
```

If you want to do some changes to confirmation notification you can make a copy in App :
```
    php artisan confirmation:notification
```

