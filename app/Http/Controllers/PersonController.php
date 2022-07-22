<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Models\City;
use App\Models\Person;
use App\Models\Son;

class PersonController extends Controller
{
    public function index()
    {
        $children = Son::all();
        $cities = City::all();
        $people = Person::with('city','sons')->get();
        return view('person.index',['children'=>$children, 'cities'=> $cities, 'people'=> $people]);
    }

    public function edit($id)
    {
        $person = Person::find($id);
        $children = Son::all();
        $cities = City::all();
        return view('person.edit',['children'=>$children, 'cities'=> $cities,'person'=>$person]);
    }

    public function store(PersonRequest $request)
    {
        if ($request) {
            $person = new Person($request->all());
            $person->save();
            return response()->json([
                'saved' => true,
                'person' => $person
            ]);
        }
    }

    public function update(PersonRequest $request, $id)
    {
        if ($request) {
            $person = Person::find($id);
            $person->update($request->all());
            return response()->json([
                'updated' => true,
            ]);
        }
    }

    public function delete($id)
    {
        $person = Person::find($id);
        $person->delete();
        return response()->json([
            'deleted' => true
        ]);
    }
}
