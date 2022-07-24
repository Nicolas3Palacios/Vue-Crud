<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Models\City;
use Exception;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('city.index', ['cities' => $cities]);
    }

    public function edit($id)
    {
        $city = City::find($id);
        return view('city.edit', ['city' => $city]);
    }

    public function store(CityRequest $request)
    {
        if ($request) {
            $city = new City($request->all());
            $city->save();
            return response()->json([
                'saved' => true,
                'city' => $city
            ]);
        }
    }

    public function update(CityRequest $request, $id)
    {
        if ($request) {
            $city = City::find($id);
            $city->update($request->all());
            return response()->json([
                'updated' => true,
            ]);
        }
    }

    public function delete($id)
    {
        $city = City::find($id);
        $city->delete();
        return response()->json([
            'deleted' => true
        ]);
    }
}
