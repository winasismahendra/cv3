<?php

use Illuminate\Database\Seeder;
use App\Province;
use App\City;
use Kavist\RajaOngkir\RajaOngkir;

class LocationsTableSeeder extends Seeder
{	
	public function __construct(RajaOngkir $ongkir)
	{ 
	    $this->ongkir = $ongkir;
	}

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataProvinsi = $this->ongkir->provinsi()->all();

        foreach ($dataProvinsi as $key => $provinceRow) {
        	Province::create([
        		'province_id' => $provinceRow['province_id'],
        		'title' => $provinceRow['province']
        	]);

        	$dataKota = $this->ongkir->kota()->dariProvinsi($provinceRow['province_id'])->get();

        	foreach ($dataKota as $key => $kotaRow) {
        		City::create([
	        		'province_id' => $kotaRow['province_id'],
	        		'city_id' => $kotaRow['city_id'],
	        		'title' => $kotaRow['city_name']
	        	]);
        	}
        }
    }
}
