<?php

use Illuminate\Database\Seeder;

class CompetitionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            DB::table('competitions')->insert([
                'name' => str_random(10),
                'establisher' => 1,
                'created_at' => date("Y-m-d H:i:s")
            ]);
        }

    }
}
