<?php
namespace Lfbellante\PackageLaravelItaly;
use Illuminate\Support\ServiceProvider;

class PackageLaravelItalyServiceProvider extends ServiceProvider
{
    /**
    * Publishes configuration file.
    *
    * @return  void
    */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/italy.php' => config_path('italy.php'),
        ], 'italy-config');

        $this->publishes([
            __DIR__ . '/../database/migrations/create_regions_table.php' => database_path('migrations/' . date('Y_m_d_Hi', time()) . '01_create_regions_table.php'),
            __DIR__ . '/../database/migrations/create_provinces_table.php' => database_path('migrations/' . date('Y_m_d_Hi', time()) . '02_create_provinces_table.php'),
            __DIR__ . '/../database/migrations/create_cities_table.php' => database_path('migrations/' . date('Y_m_d_Hi', time()) . '03_create_cities_table.php'),

          ], 'italy-migrations');

	    $this->publishes([
		    __DIR__ . '/../database/seeders/RegionSeeder.php' => database_path('seeders/RegionSeeder.php'),
            __DIR__ . '/../database/seeders/ProvinceSeeder.php' => database_path('seeders/ProvinceSeeder.php'),
            __DIR__ . '/../database/seeders/CitySeeder.php' => database_path('seeders/CitySeeder.php'),
            __DIR__ . '/../database/storage/comuni.json' => storage_path('app/comuni.json'),
	    ], 'italy-seeders');

        $this->publishes([
            __DIR__ . '/../database/factories/RegionFactory.php' => database_path('factories/RegionFactory.php'),
            __DIR__ . '/../database/factories/ProvinceFactory.php' => database_path('factories/ProvinceFactory.php'),
            __DIR__ . '/../database/factories/CityFactory.php' => database_path('factories/CityFactory.php'),
        ], 'italy-factories');
    }
    /**
    * Make config publishment optional by merging the config from the package.
    *
    * @return  void
    */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/italy.php',
            'italy-config'
        );
    }
}