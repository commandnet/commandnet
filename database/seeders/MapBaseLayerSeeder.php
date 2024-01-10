<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MapBaseLayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('map_base_layers')->insert([
            'name' => 'OpenStreetMap',
            'url' => 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            'maxzoom' => 21,
            'attribution' => "Map data: © OpenStreetMap contributors",
            'type' => "TMS"
        ]);
        DB::table('map_base_layers')->insert([
            'name' => 'OpenTopoMap',
            'url' => 'https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png',
            'maxzoom' => 21,
            'type' => "TMS",
            'attribution' => "Map data: © OpenStreetMap contributors, SRTM | Map style: © OpenTopoMap (CC-BY-SA)"
        ]);
        DB::table('map_base_layers')->insert([
            'name' => 'Google Hybrid',
            'url' => 'https://mt1.google.com/vt/lyrs=y&x={x}&y={y}&z={z}',
            'maxzoom' => 21,
            'type' => "TMS",
            'attribution' => "Google Hybrid"
        ]);
        DB::table('map_base_layers')->insert([
            'name' => 'Google Satellite',
            'url' => 'https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',
            'maxzoom' => 21,
            'type' => "TMS",
            'attribution' => "Google Satellite"
        ]);
        DB::table('map_base_layers')->insert([
            'name' => 'Google Road',
            'url' => 'https://mt1.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',
            'maxzoom' => 21,
            'type' => "TMS",
            'attribution' => "Google Road"
        ]);
        // DB::table('map_base_layers')->insert([
        //     'name' => 'Bing Aerial',
        //     'url' => 'http://ecn.t3.tiles.virtualearth.net/tiles/a{q}.jpeg?g=1',
        //     'maxzoom' => 17,
        //     'type' => "TMS",
        //     'attribution' => "Bing Aerial"
        // ]);
        DB::table('map_base_layers')->insert([
            'name' => 'ESRI Aerial',
            'url' => 'http://services.arcgisonline.com/ArcGis/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}.png',
            'maxzoom' => 21,
            'type' => "TMS",
            'attribution' => "ESRI Aerial"
        ]);
        DB::table('map_base_layers')->insert([
            'name' => 'NDS DOP20',
            'url' => ' https://www.geobasisdaten.niedersachsen.de/doorman/noauth/wms_ni_dop',
            'wmslayername' => "WMS_NI_DOP",
            'type' => "WMS",
            'attribution' => "Digitale Orthophotos Niedersachsen, Bodenauflösung 20 cm (DOP20)"

        ]);
    }
}
