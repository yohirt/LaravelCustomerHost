<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            $service = new \App\Service();
            $service->name_service = 'service' . $i;
            $service->price_service = $i;
            $service->type_settlement = 'Y';
            $service->save();
        }

    }
}
