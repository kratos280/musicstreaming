## Requirements

- PHP 5.4
- MySQL
- memcached

## Quick Start

Create database configuration file from default.

```bash
% cp -p app/config/local/database.php.dafault app/config/local/database.php
```

```bash
% curl -s https://getcomposer.org/installer | php
% php composer.phar install
% php artisan migrate
% php artisan serve
```

## Migrate
% php artisan migrate
% php artisan db:seed

