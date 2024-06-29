<?php

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
         // https://fuelo.net/about/api
        $today = now()->format('Y-m-d');
//        // https://laracoding.com/using-multiple-where-conditions-with-laravel-eloquent/
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
