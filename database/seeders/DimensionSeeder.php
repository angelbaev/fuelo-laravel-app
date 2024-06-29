<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DimensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dimensions = [
            ['id' => Str::uuid(), 'name' => 'лв./л', 'status' => 1],
            ['id' => Str::uuid(), 'name' => 'лв./кг', 'status' => 1],
        ];

        DB::table('dimensions')->insert($dimensions);

    }
}
