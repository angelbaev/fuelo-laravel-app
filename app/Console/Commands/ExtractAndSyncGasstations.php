<?php

namespace App\Console\Commands;

use App\DataTransferObjects\BrandDataTransferObject;
use App\Services\BrandService;
use Illuminate\Console\Command;
use Abaev\Fuelo\FueloClientApi;

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

    public function __construct(protected BrandService $brandService)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // https://fuelo.net/about/api
        $today = now()->format('Y-m-d');
        $apiKey = config('fuelo.api_key');
        $client = new FueloClientApi($apiKey);


        // https://laracoding.com/using-multiple-where-conditions-with-laravel-eloquent/
        $brandCollection = $this->brandService->all(
            [
                ['status', '=', 0]
            ],
            50,
            BrandDataTransferObject::class
        );
        $this->info('Start extract and sync.');
        foreach($brandCollection as $brand) {
            $this->info('Extract ('.$brand->name.').');
            foreach(['gasoline', 'diesel', 'lpg','methane'] as $fuelCode) {
                $responce = $client->getGasStations($brand->src_id, $fuelCode);

                if (isset($responce['error_message'])) {
                    continue;
                }

                var_dump($responce);
            }

            // $responce['error_message'];

        }
        $this->info('Gasstations have been synced successfully.');

    }
}
