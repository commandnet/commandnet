<?php

namespace App\Http\Controllers\api\map;

use App\Http\Controllers\Controller;
use App\Models\MapBaseLayer;

class MapBaseLayerController extends Controller
{
    public function index()
    {
        return MapBaseLayer::all();
    }
    public function show(int $id)
    {
        return MapBaseLayer::findOrFail($id);
    }
}
