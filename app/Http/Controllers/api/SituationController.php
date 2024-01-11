<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSituationRequest;
use Illuminate\Http\Request;
use App\Models\Situation;

class SituationController extends Controller
{
    public function index()
    {
        return Situation::all();
    }
    public function show(int $id)
    {
        return Situation::findOrFail($id);
    }
    public function store(CreateSituationRequest $request)
    {
        $name = $request->input('name');
        $situation = new Situation();
        $situation->name = $name;
        $situation->save();
        return $situation;
    }
    public function alarminbox()
    {
        return [];
    }
}
