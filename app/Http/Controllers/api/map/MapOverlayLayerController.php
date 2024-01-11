<?php

namespace App\Http\Controllers\api\map;

use App\Http\Controllers\Controller;
use App\Models\MapOverlayLayer;

class MapOverlayLayerController extends Controller
{
    public function index()
    {
        return MapOverlayLayer::all();
    }
    public function show(int $id)
    {
        return MapOverlayLayer::findOrFail($id);
    }
}
