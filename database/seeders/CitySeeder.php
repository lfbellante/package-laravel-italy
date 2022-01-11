<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Lfbellante\PackageLaravelItaly\Models\City;
use Lfbellante\PackageLaravelItaly\Models\Province;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        switch (config('italy.source_type')) {
            case 'json':
                $response = Http::get(config('italy.source'));
                if ($response->ok()) {
                    foreach ($response->json() as $city) {
                        $province = Province::whereCode($city['sigla'])->firstOrFail();

                        City::updateOrCreate([
                            'province_id' => $province->id,
                            'name' => $city['name'],
                            'cadastral_code' => $city['codiceCatastale'],
                            'istat_code' => $city['codice'],
                            'residents' => $city['popolazione'],
                        ]);
                    }
                }
                break;

            case 'file':
            default:
                $cities = collect(json_decode(Storage::get(config('italy.source'))));
                if ($cities->count() > 0) {
                    foreach ($cities as $city) {
                        $province = Province::whereCode($city->sigla)->firstOrFail();

                        City::updateOrCreate([
                            'province_id' => $province->id,
                            'name' => $city->nome,
                            'cadastral_code' => $city->codiceCatastale,
                            'istat_code' => $city->codice,
                            'residents' => $city->popolazione,
                        ]);
                    }
                }
                break;
        }
    }
}
