<?php

use Illuminate\Database\Seeder;

class FactoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('factories')->insert([
            [
              'name' => 'Apple',
              'slug' => 'Apple'
            ],
            [
                'name' => 'Samsung',
                'slug' => 'Samsung'
            ],
            [
                'name' => 'HTC',
                'slug' => 'HTC'
            ],
            [
                'name' => 'Oppo',
                'slug' => 'Oppo'
            ],
    ]);
    }
}
