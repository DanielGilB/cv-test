<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tables')->insert([
            [
                'minSlots' => 1,
                'maxSlots' => 2
            ],
            [
                'minSlots' => 1,
                'maxSlots' => 2
            ],
            [
                'minSlots' => 3,
                'maxSlots' => 4
            ],
            [
                'minSlots' => 3,
                'maxSlots' => 4
            ]
        ]);
    }
}
