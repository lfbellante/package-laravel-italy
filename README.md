# Laravel Italy Package

This is a package for the laravel framework witch contains all italy cities, provinces and regions.

## Installation
```bash
composer require lfbellante/package-laravel-italy
```

## Usage
Next, you should publish the Italy configuration, migration and seeder files using the vendor:publish Artisan command.

The italy configuration file will be placed in your application's config directory
The italy migrations, factories and seeders files will be placed in your application's database directory.
The italy json source file will be placed in your storage/app directory. 

```bash
# Publish config file
php artisan vendor:publish --tag=italy-config

# Load migration & run
php artisan vendor:publish --tag=italy-migrations
php artisan migrate

# Load seeder
php artisan vendor:publish --tag=italy-seeders

# Seeding Regions
php artisan db:seed --class=RegionSeeder

# Seeding Province
php artisan db:seed --class=ProvinceSeeder

# Seeding City
php artisan db:seed --class=CitySeeder

```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)