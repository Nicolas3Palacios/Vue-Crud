<?php

namespace App\Http\Controllers;

use App\Http\Requests\SonRequest;
use App\Models\Person;
use App\Models\Son;
use Illuminate\Http\Request;

class SonController extends Controller
{

    public function edit($id)
    {
        $son = Son::find($id);
        $people = Person::all();
        return view('person.son-edit',['son'=>$son, 'people'=> $people]);
    }

    public function store(SonRequest $request)
    {
        if ($request) {
            $son = new Son($request->all());
            $son->save();
            return response()->json([
                'saved' => true,
                'son' => $son
            ]);
        }
    }

    public function update(SonRequest $request, $id)
    {
        if ($request) {
            $son = Son::find($id);
            $son->update($request->all());
            return response()->json([
                'updated' => true,
            ]);
        }
    }

    public function delete($id)
    {
        $son = Son::find($id);
        $son->delete();
        return response()->json([
            'deleted' => true
        ]);
    }
}
