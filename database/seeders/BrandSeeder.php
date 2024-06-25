<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            ['id' => Str::uuid(), 'src_id' => 6, 'logo' => '/public/assets/images/petrol-small.png', 'name' => 'Petrol', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 33, 'logo' => '/public/assets/images/kosanya-small.png', 'name' => 'Косаня', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 4, 'logo' => '/public/assets/images/rompetrol-small.png', 'name' => 'Rompetrol', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 25, 'logo' => '/public/assets/images/raykovserviz-small.png', 'name' => 'Райков Сервиз', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 169, 'logo' => '/public/assets/images/avia-small.png', 'name' => 'AVIA', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 17, 'logo' => '/public/assets/images/alco-small.png', 'name' => 'АЛ+КО', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 14, 'logo' => '/public/assets/images/gazprom-small.png', 'name' => 'Gazprom', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 31, 'logo' => '/public/assets/images/poweroil-small.png', 'name' => 'Power Oil', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 122, 'logo' => '/public/assets/images/vm-small.png', 'name' => 'VM Petroleum', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 3, 'logo' => '/public/assets/images/omv-small.png', 'name' => 'OMV', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 12, 'logo' => '/public/assets/images/sng-small.png', 'name' => 'SNG', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 82, 'logo' => '/public/assets/images/interspeed-small.png', 'name' => 'InterSpeed', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 7, 'logo' => '/public/assets/images/light-commerce-small.png', 'name' => 'Light', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 30, 'logo' => '/public/assets/images/ap-small.png', 'name' => 'AP', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 22, 'logo' => '/public/assets/images/gastrade-small.png', 'name' => 'Газтрейд', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 23, 'logo' => '/public/assets/images/zara-small.png', 'name' => 'Зара', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 18, 'logo' => '/public/assets/images/cruise-small.png', 'name' => 'Круиз', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 5, 'logo' => '/public/assets/images/shell-small.png', 'name' => 'Shell', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 15, 'logo' => '/public/assets/images/dieselor-small.png', 'name' => 'Dieselor', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 178, 'logo' => '/public/assets/images/maidex-small.png', 'name' => 'Maidex', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 38, 'logo' => '/public/assets/images/tip-small.png', 'name' => 'Тип', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 9, 'logo' => '/public/assets/images/bultrade-small.png', 'name' => 'Bultrade', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 1, 'logo' => '/public/assets/images/eko-gr-small.png', 'name' => 'Eko', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 2, 'logo' => '/public/assets/images/lukoil-small.png', 'name' => 'Lukoil', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 21, 'logo' => '/public/assets/images/bulmarket-small.png', 'name' => 'Булмаркет', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 24, 'logo' => '/public/assets/images/apid2000-small.png', 'name' => 'Апид 2000', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 168, 'logo' => '/public/assets/images/chimoil-small.png', 'name' => 'CHIMOIL', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 8, 'logo' => '/public/assets/images/atanasov-group-small.png', 'name' => 'Атанасов груп', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 39, 'logo' => '/public/assets/images/benita-small.png', 'name' => 'Бенита', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 32, 'logo' => '/public/assets/images/go-small.png', 'name' => 'Go Petroleum', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 29, 'logo' => '/public/assets/images/joana-small.png', 'name' => 'Йоана', 'status' => 0],
        ];

        DB::table('brands')->insert($brands);
    }
}
