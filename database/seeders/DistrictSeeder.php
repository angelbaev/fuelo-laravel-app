<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $districts = [
            ['id' => Str::uuid(), 'src_id' => 1, 'name' => 'Благоевград', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 2, 'name' => 'Бургас', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 3, 'name' => 'Варна', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 4, 'name' => 'Велико Търново', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 5, 'name' => 'Видин', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 6, 'name' => 'Враца', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 7, 'name' => 'Габрово', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 8, 'name' => 'Добрич', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 9, 'name' => 'Кърджали', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 10, 'name' => 'Кюстендил', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 11, 'name' => 'Ловеч', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 12, 'name' => 'Монтана', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 13, 'name' => 'Пазарджик', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 14, 'name' => 'Перник', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 15, 'name' => 'Плевен', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 16, 'name' => 'Пловдив', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 17, 'name' => 'Разград', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 18, 'name' => 'Русе', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 19, 'name' => 'Силистра', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 20, 'name' => 'Сливен', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 21, 'name' => 'Смолян', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 22, 'name' => 'София', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 23, 'name' => 'София (столица)', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 24, 'name' => 'Стара Загора', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 25, 'name' => 'Търговище', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 26, 'name' => 'Хасково', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 27, 'name' => 'Шумен', 'status' => 0],
            ['id' => Str::uuid(), 'src_id' => 28, 'name' => 'Ямбол', 'status' => 0],
        ];

        DB::table('districts')->insert($districts);

    }
}
