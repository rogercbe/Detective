# Detective
This package easily add sorting and filtering functionality to any of your models.

## Table of Contents
- [Installation](#installation)
- [Usage](#usage)
- [Contributing](#contributing)
- [License](#license)

## Installation
Pull this package through Composer.
```sh
composer require rogercbe/detective
```
After the installation add the ServiceProvider to the providers array in your `config/app.php` file.
```php
Rogercbe\Detective\DetectiveServiceProvider::class,
```
Finally to publish the config files use:
```sh
php artisan vendor:publish
```
This will create a `detective.php` file inside your `config/` directory in order to override default configuration.

## Usage
WIP

## Contributing
You are more than welcome to contribute to the package by submitting a [Pull Request](https://github.com/rogercbe/Detective/pulls).

## License
The MIT License (MIT). Please see [License File](https://github.com/rogercbe/Detective/blob/master/License) for more information.
