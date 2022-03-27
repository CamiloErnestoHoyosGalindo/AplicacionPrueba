<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\Client;
use App\Models\User;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::truncate();

        $ciudad = new City();
        $ciudad->name = "Bogota D.C.";
        $ciudad->save();

        $ciudad = new City();
        $ciudad->name = "Cali";
        $ciudad->save();

        $ciudad = new City();
        $ciudad->name = "Choco";
        $ciudad->save();

        $ciudad = new City();
        $ciudad->name = "Ibague";
        $ciudad->save();

        $ciudad = new City();
        $ciudad->name = "Neiva";
        $ciudad->save();

        $ciudad = new City();
        $ciudad->name = "Cali";
        $ciudad->save();

        $ciudad = new City();
        $ciudad->name = "Medellin";
        $ciudad->save();

        $ciudad = new City();
        $ciudad->name = "Leticia";
        $ciudad->save();

        $ciudad = new City();
        $ciudad->name = "Cartagena";
        $ciudad->save();

        $ciudad = new City();
        $ciudad->name = "Santa Martha";
        $ciudad->save();

        $ciudad = new City();
        $ciudad->name = "Pasto";
        $ciudad->save();

        $ciudad = new City();
        $ciudad->name = "Villeta";
        $ciudad->save();

        $ciudad = new City();
        $ciudad->name = "Zipaquira";
        $ciudad->save();

        Client::truncate();

        $cliente = new Client();
        $cliente->name = "Camilo";
        $cliente->city = "Bogota D.C.";
        $cliente->save();

        $cliente = new Client();
        $cliente->name = "Ernesto";
        $cliente->city = "Bogota D.C.";
        $cliente->save();

        $cliente = new Client();
        $cliente->name = "Jose";
        $cliente->city = "Cali";
        $cliente->save();

        $cliente = new Client();
        $cliente->name = "Maria";
        $cliente->city = "Zipaquira";
        $cliente->save();

        $cliente = new Client();
        $cliente->name = "Yuki";
        $cliente->city = "Barranquilla";
        $cliente->save();

        $cliente = new Client();
        $cliente->name = "Juana";
        $cliente->city = "Cali";
        $cliente->save();

        $cliente = new Client();
        $cliente->name = "Natalia";
        $cliente->city = "Zipaquira";
        $cliente->save();

        $cliente = new Client();
        $cliente->name = "Laura";
        $cliente->city = "Leticia";
        $cliente->save();

        $cliente = new Client();
        $cliente->name = "Felipe";
        $cliente->city = "Zipaquira";
        $cliente->save();

    }
}
