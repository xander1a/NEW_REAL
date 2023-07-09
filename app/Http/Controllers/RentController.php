<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Property;
use App\Models\Rent;
use Illuminate\Http\Request;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function show(Rent $rent)
    {
    $data = Property::where('advert', 'Rent')
    ->orderBy('created_at', 'desc')
    ->get();

      $hot = Property::select('name', 'price', 'id','type', 'photo_names', 'address','currency')
    ->where('price', '>', 800)
    ->get();
        //
        //dd($data);
        return view('buysalerent_data',['photos'=>$data,'hot'=>$hot]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function edit(Rent $rent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rent $rent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rent $rent)
    {
        //
    }


  public function user(Request $request)
    
    {

      $user= $request->input('user_rent');

      $data = DB::table('commisioners')->where('id', $user)->get();
     
      $photos = Property::where('advert', 'Rent')
    ->orderBy('created_at', 'desc')
    ->get();

    //   $photos =Property::select('name', 'price', 'type', 'photo_names', 'address')
    //  ->where('advert', 'rent')
    //  ->get();
     
      $hot = Property::select('name', 'price','id', 'type', 'photo_names', 'address','currency')
      ->where('price', '>', 50000)
     ->get();
    
    return view('buysalerent', compact('data','photos','hot'));


    }
    
    
}