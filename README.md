# NasceniaShop

This is a simple Shop Application made with Codeigniter 3 and Bootstrap 4. Features includes:

  - Admininstration Panel
  - User Roles - admin and member
  - Product Creation
  - Category Creation
  - Submit product reviews and ratings.

## Installation
  - Create a database
  - Set database connection on this file - application/config/database.php
  - Set base url to this variable $config['base_url']- application/config/config.php
  - Import DB Schema - http://[address]/migrate/do_migration
  - Install dependencies to root by the following command
```sh
$ composer install
```
  - You are good to go!

Every time you create new model file run the following command. If not, you will see class not found exception when you try to access your model file.
```sh
$ composer dump-autoload
```

## Getting Started
  - Login URL - http://[address]/login
  - Admin Username: admin  | Password: admin123
  - Memeber Username: member  | Password: member123
  - Create a Category from admin panel browsing by left sidebar: Categorys->Create Category 
  - Create a Product from admin panel browsing by left sidebar: Products->Create Product
  - Enjoy the Front View!

## Featues
  - Implemented XSS and CSRF for data protection
  - Used Eloquent ORM for data mapping
  - Maintained PHPDoc
  - Tested codes using PHP Codesniffer for PSR-2
  - Responsive accross all popular screen sizes

### Todos

 - User Registration
 - Templating for the views
 - Multi-level category list for the sidebar (currently supports upto 2nd level)
 - Rating star half icon
 
License
----

MIT