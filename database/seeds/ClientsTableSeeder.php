<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * `name_client`, `adress_client`, `city_client`, `email_client`, `postal_code_client`
     */
    public function run()
    {
        for ($i = 0; $i < 5; $i++) {
            $client = new \App\Client();
            $client->name_client = 'client'.$i;
            $client->adress_client = 'adress'.$i;
            $client->city_client = 'city'.$i;
            $client->email_client = 'email'.$i.'@client.pl';
            $client->postal_code_client = '123-1';
            $client->tel_client = '123-1111';
            $client->save();
        }
    }
}
