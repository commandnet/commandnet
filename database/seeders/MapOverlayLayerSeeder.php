<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapOverlayLayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('map_overlay_layers')->insert([
            'name' => 'Überschwemmungsgebiete NDS',
            'url' => ' https://www.umweltkarten-niedersachsen.de/arcgis/services/HWSchutz_wms/MapServer/WMSServer',
            'wmslayername' => "Ueberschwemmungsgebiete_Verordnungsflaechen_Niedersachsen_HWS",
            'type' => "WMS",
        ]);
        DB::table('map_overlay_layers')->insert([
            'name' => 'Überschwemmungsgebiete HB',
            'url' => ' https://www.umweltkarten-niedersachsen.de/arcgis/services/HWSchutz_wms/MapServer/WMSServer',
            'wmslayername' => "Ueberschwemmungsgebiete_Verordnungsflaechen_Bremen_HWS",
            'type' => "WMS",
        ]);
        DB::table('map_overlay_layers')->insert([
            'name' => 'Vorl. Überschwemmungsg. NDS',
            'url' => ' https://www.umweltkarten-niedersachsen.de/arcgis/services/HWSchutz_wms/MapServer/WMSServer',
            'wmslayername' => "vorlaeufig_gesicherte_Ueberschwemmungsgebiete_Niedersachsen_HWS",
            'type' => "WMS",
        ]);
    }
}
