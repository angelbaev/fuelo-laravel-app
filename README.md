
# Fuelo Laravel App

The Fuelo API provides read access to the database of prices and gas stations on the fuelo.net website.

## Authors

- [@Angel Baev](https://github.com/angelbaev)



## Environment Variables

To run this project, you will need to add the following environment variables to your .env file

`ABAEV_API_ACCESS_KEY`



## Installation

Step 1: Update composer.json
Add the repository and package information in the composer.json file of your Laravel project:
```json
{
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/angelbaev/abaev-fuelo-client-api"
        }
    ],
    "require": {
        "angelbaev/abaev-fuelo-client-api": "dev-main"
    }
}
```


Step 2: Install the package
Run the following command to install the package:

```bash
composer require angelbaev/abaev-fuelo-client-api:dev-main
```
Step 3: Publish the configuration file
Publish the configuration file (if the package provides one) using the following command:

```bash
php artisan vendor:publish --provider="Angelbaev\FueloClientApi\FueloClientApiServiceProvider"
```
Step 4: Configure the package
Open the configuration file (config/fuelo.php or similar) and set the necessary options.

Step 5: Autoloading
Ensure autoloading is set up correctly in composer.json:

```json
{
    "autoload": {
        "psr-4": {
            "Angelbaev\\FueloClientApi\\": "src/"
        }
    }
}
```
Then, run:
```json
composer dump-autoload

```
## API Reference

#### Information


```bash

  POST            api/auth/login ................................................................................................................................................................. login › AuthController@login
  POST            api/auth/logout .............................................................................................................................................................. logout › AuthController@logout
  POST            api/auth/me .......................................................................................................................................................................... me › AuthController@me
  POST            api/auth/refresh ........................................................................................................................................................... refresh › AuthController@refresh
  POST            api/auth/register ........................................................................................................................................................ register › AuthController@register
  GET|HEAD        api/brands ............................................................................................................................................................. brands.index › BrandController@index
  POST            api/brands ............................................................................................................................................................. brands.store › BrandController@store
  GET|HEAD        api/brands/create .................................................................................................................................................... brands.create › BrandController@create
  GET|HEAD        api/brands/{brand} ....................................................................................................................................................... brands.show › BrandController@show
  PUT|PATCH       api/brands/{brand} ................................................................................................................................................... brands.update › BrandController@update
  DELETE          api/brands/{brand} ................................................................................................................................................. brands.destroy › BrandController@destroy
  GET|HEAD        api/brands/{brand}/edit .................................................................................................................................................. brands.edit › BrandController@edit
  GET|HEAD        api/districts .................................................................................................................................................... districts.index › DistrictController@index
  GET|HEAD        api/districts/{district} ........................................................................................................................................... districts.show › DistrictController@show
  GET|HEAD        api/dimensions .................................................................................................................................................... dimensions.index › DimensionController@index
  GET|HEAD        api/dimensions/{district} ........................................................................................................................................... dimensions.show › DimensionController@show
  GET|HEAD        api/fuels ................................................................................................................................................................ fuels.index › FuelController@index
  GET|HEAD        api/fuels/{fuel} ........................................................................................................................................................... fuels.show › FuelController@show
  GET|HEAD        api/gasstations .............................................................................................................................................. gasstations.index › GasStationController@index
  GET|HEAD        api/gasstations/{gasstation} ................................................................................................................................... gasstations.show › GasStationController@show
  GET|HEAD        api/prices ......................................................................................................................................................... prices.index › FuelPriceController@index
  GET|HEAD        api/prices/{price} ................................................................................................................................................... prices.show › FuelPriceController@show
```



## Usage

You can now use the Fuelo API in your Laravel application. Here is an example command to extract and sync fuel prices:
```php
namespace App\Console\Commands;

use App\DataTransferObjects\DimensionDataTransferObject;
use App\DataTransferObjects\FuelDataTransferObject;
use App\DataTransferObjects\FuelPriceDataTransferObject;
use App\Models\Dimension;
use App\Models\Fuel;
use App\Services\FuelService;
use App\Services\DimensionService;
use App\Services\FuelPriceService;
use Illuminate\Console\Command;
use Fuelo;

/**
 * Class ExtractAndSyncFuelPrices
 * @package App\Console\Commands
 * php artisan app:extract-and-sync-fuel-prices
 */
class ExtractAndSyncFuelPrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:extract-and-sync-fuel-prices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function __construct(
        protected FuelService $fuelService,
        protected DimensionService $dimensionService,
        protected FuelPriceService $fuelPriceService
    ) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = now()->format('Y-m-d');
        $fuelCollection = $this->fuelService->all(
            [
                ['status', '=', Fuel::STATUS_ACTIVE]
            ],
            15
        );
        $this->info('Start extract and sync.');
        foreach($fuelCollection as $fuel) {
            $responce = Fuelo::getPrice($fuel->code, $today);

            if (isset($responce['error_message'])) {
                continue;
            }

            $fuelPrice = $this->fuelPriceService->findPriceByFuelAndDate($fuel, $responce['date']);

            if ($fuelPrice) {
                $this->info('--Skip we have extract data for today about ('.$fuel->name.') with code (' . $fuel->code . ').');
                continue;
            }

            $dimension = $this->dimensionService->findByName($responce['dimension']);
            if (!$dimension) {
                $dimension = $this->dimensionService->create(
                    new DimensionDataTransferObject(null, $responce['dimension'], Dimension::STATUS_ACTIVE)
                );

                if (!$dimension instanceof DimensionDataTransferObject) {
                    $dimension = DimensionDataTransferObject::fromModel($dimension);
                }
            }

            $fielPrice = new FuelPriceDataTransferObject(
                null,
                (float)$responce['price'],
                $responce['date'],
                $fuel,
                $dimension
            );
            $this->fuelPriceService->create($fielPrice);

            $this->info('Extract ('.$fuel->name.') with code (' . $fuel->code . ').');

        }
        $this->info('Fuel prices have been synced successfully.');
    }
}

```
## Additional Information

For more details on how to use Laravel and the Fuelo API, please refer to the official documentation:

- [Laravel Documentation](https://laravel.com/docs/11.x)
- [Fuelo API Documentation](https://fuelo.net/about/api)
- [ABaev Fuelo API Client Documentation](https://github.com/angelbaev/abaev-fuelo-client-api)

