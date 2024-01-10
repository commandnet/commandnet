<?php

namespace App\Http\Controllers\api\map;

use App\Http\Controllers\Controller;
use App\Models\MapBaseLayer;
use Illuminate\Http\Request;

class BaseLayerController extends Controller
{
    public function index()
    {
        return MapBaseLayer::all();
    }
}
