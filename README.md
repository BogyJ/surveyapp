# Survey application
* You can create surveys and share them via link and get responses from other users
* Purpose of this application is to practice penetration testing using variety of techniques
  
## Prerequisites
* php 7.2 or greater
* Composer 2.0.9
* Apache2.4 Web Server
* MySQL database (MariaDB server)

## How to deploy
* If you are using Apache Web Server then you should place project in `/` folder. Just changing .htaccess file won't be enough since the source code should be changed as well
* You need to install composer and run `composer init` command to install all packages from composer.json file
* Maybe it will be necessary to run `composer dump auto-load` also
* Link to MySQL database file: https://1drv.ms/u/s!AqYDwuDTtO3ZlCcMu14WAZq1KETR
* All the namespace folders needs to be capitalized in order application to work (naming convention for autoload) see https://getcomposer.org/doc/01-basic-usage.md#autoloading
