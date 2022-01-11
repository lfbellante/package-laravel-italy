<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Lfbellante\PackageLaravelItaly\Models\Region;

class RegionSeeder extends Seeder
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
                        Region::updateOrCreate([
                            'code' => $city['regione']['codice'],
                            'name' => $city['regione']['nome'],
                        ]);
                    }
                }
                break;
            case 'file':
            default:
                $cities = collect(json_decode(Storage::get(config('italy.source'))));
                if ($cities->count() > 0) {
                    foreach ($cities as $city) {
                        Region::updateOrCreate([
                            'code' => $city->regione->codice,
                            'name' => $city->regione->nome,
                        ]);
                    }
                }
                break;
        }
    }
}
