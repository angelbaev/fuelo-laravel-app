<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class FuelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fuels = [
            ['id' => Str::uuid(), 'code' => 'gasoline', 'name' => 'Бензин A95', 'status' => 0],
            ['id' => Str::uuid(), 'code' => 'gasoline98', 'name' => 'Бензин A98', 'status' => 0],
            ['id' => Str::uuid(), 'code' => 'diesel', 'name' => 'Дизел', 'status' => 0],
            ['id' => Str::uuid(), 'code' => 'dieselplus', 'name' => 'Дизел премиум', 'status' => 0],
            ['id' => Str::uuid(), 'code' => 'lpg', 'name' => 'Пропан Бутан', 'status' => 0],
            ['id' => Str::uuid(), 'code' => 'methane', 'name' => 'Метан', 'status' => 0],
        ];

        DB::table('fuels')->insert($fuels);

    }
}
