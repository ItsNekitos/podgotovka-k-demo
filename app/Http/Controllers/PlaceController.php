<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlaceCreateRequest;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlaceController extends Controller
{
    public function placeform(PlaceCreateRequest $request){
            $place = new Place();

            $place->name = $request->name;
            $place->desc = $request->desc;

            $path = Storage::disk("public")->putFile('/photos', $request->file("photo"));
            $place->photo = 'storage/'.$path;

            $place->save();
            return redirect()->route('homepage');
    }
}
