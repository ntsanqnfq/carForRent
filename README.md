
# How to run :

## Environment
- Composer:
> Folow the directions in [How to install Composer](https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-18-04)

- Composer init:
```sh  
$ composer install  
$ composer update
```  

- PHP DotEnv:
```sh  
$ composer require vlucas/phpdotenv  
```  


## Test
- PHP Unit:
```sh  
$ composer require --dev phpunit/phpunit ^9  
```  
- XDebug:
```sh  
$ sudo apt-get install php-xdebug  
$ ./vendor/bin/phpunit --generate-configuration  
```

## API
```sh  
$ composer require firebase/php-jwt
```