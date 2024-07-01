<?php

namespace App\Console\Commands;

use App\DataTransferObjects\BrandDataTransferObject;
use App\DataTransferObjects\GasStationDataTransferObject;
use App\Models\Brand;
use App\Services\BrandService;
use App\Services\FuelService;
use App\Services\GasStationService;
use Illuminate\Console\Command;
use App\Models\Fuel;
use Fuelo;

/**
 * Class ExtractAndSyncGasstations
 * @package App\Console\Commands
 * php artisan app:extract-and-sync-gasstations
 */
class ExtractAndSyncGasstations extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:extract-and-sync-gasstations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function __construct(protected GasStationService $gasStationService, protected BrandService $brandService,  protected FuelService $fuelService)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // https://laracoding.com/using-multiple-where-conditions-with-laravel-eloquent/

        $fuelCodes = $this->fuelService->all(
            [
                ['status', '=', Fuel::STATUS_ACTIVE]
            ],
            15
        )->pluck('code');

        $brandCollection = $this->brandService->all(
            [
                ['status', '=', Brand::STATUS_INACTIVE]
            ],
            50
        );

        $this->info('Start extract and sync.');
        foreach($brandCollection as $brand) {
            $this->info('Extract ('.$brand->name.').');
            foreach($fuelCodes as $fuelCode) {
           
                $responce = Fuelo::getGasStations($brand->src_id, $fuelCode);

                if (isset($responce['error_message'])) {
                    continue;
                }

                $this->info('Extract data for ('.$brand->name.') with fuel code (' . $fuelCode . ').');

                foreach((array)$responce['gasstations'] as $gas_station) {

                    if ($this->gasStationService->findGasStationBySourceId($gas_station['id'])) {
                        $this->info('--Skip gasstations with src id ('.$gas_station['id'].') already exist in the system.');
                        continue;
                    }

                    $brand = $this->brandService->findBrandBySourceId((int)$gas_station['brand_id']);

                    $gasStation = new GasStationDataTransferObject(
                        null,
                        $gas_station['id'],
                        $gas_station['brand_id'],
                        $gas_station['name'],
                        $gas_station['city'],
                        $gas_station['address'],
                        $gas_station['lat'],
                        $gas_station['lon'],
                        $brand
                    );

                    $this->gasStationService->create($gasStation);
                    $this->info('Add gasstation with id ('.$gas_station['id'].').');
                }
                sleep(1);
                gc_collect_cycles();
            }
        }
        $this->info('Gasstations have been synced successfully.');

    }
}
