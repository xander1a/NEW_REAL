<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Property;
class SearchController extends Controller
{
    //
    public function properties_search(Request $request)
{
    // $photos = Property::all();
    $photos = DB::table('properties')
    ->where('name', 'LIKE', '%'.$request->input('query').'%')
    ->orWhere('price', 'LIKE', '%'.$request->input('query').'%')
    ->orWhere('advert', 'LIKE', '%'.$request->input('query').'%')
    ->orWhere('type', 'LIKE', '%'.$request->input('query').'%')
    ->orWhere('address', 'LIKE', '%'.$request->input('query').'%')
    ->orWhere('photo_names', 'LIKE', '%'.$request->input('query').'%')
    ->orWhere('photo_paths', 'LIKE', '%'.$request->input('query').'%')
    ->get();

    //dd($photos );

    $results = Property::select('name', 'price', 'advert', 'photo_names', 'address')
    ->where('advert', 'sale')
    ->get();

    $results2 = Property::select('name', 'price', 'advert', 'photo_names', 'address')
    ->where('advert', 'rent')
    ->get();

    if(empty($photos)){


        return view('no_result')->with('error','No Result found');

    }
    else{
       // dd($photos);
        return view('welcome', compact('photos','results','results2',));
        // return view('/', compact('photos'));
        //dd($photos);

    }



   // return view('manageItems', compact('data'));
}


}
