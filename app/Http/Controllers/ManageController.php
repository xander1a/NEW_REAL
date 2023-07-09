<?php

namespace App\Http\Controllers;
use App\Models\Property;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    public function manage(Request $request){

        $manage = Property::all();
        return view('data_mng', compact('manage'));

    }
}
