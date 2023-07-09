<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Property;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
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
    
    
  public function user(Request $request)
    
    {

      $user= $request->input('user_sale');

   $data = DB::table('commisioners')->where('id', $user)->get();
     
   $photos = Property::where('advert', 'Sale')
    ->orderBy('created_at', 'desc')
    ->get();


  $hot = Property::select('name', 'price', 'type','id', 'photo_names', 'address','currency')
    ->where('price', '>', 50000)
    ->get();
    //  $photos =Property::select('name', 'price', 'type', 'photo_names', 'address')
    //  ->where('advert', 'Sale')
    //  ->get();
//dd($data);
              return view('buysalerent', compact('data','photos','hot'));


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
       $data = Property::where('advert', 'Sale')
    ->orderBy('created_at', 'desc')
    ->get();

        $hot = Property::select('name', 'price', 'type', 'photo_names', 'address','currency')
    ->where('price', '>', 800)
    ->get();
     //  dd($data);
        return view('buysalerent_data',['photos'=>$data,'hot'=>$hot]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
