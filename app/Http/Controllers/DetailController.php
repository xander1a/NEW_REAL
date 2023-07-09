<?php

namespace App\Http\Controllers;

use App\Models\Commisioner;
use App\Models\Detail;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DetailController extends Controller
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
        
        
        
        $data=new Detail();
        $data->datails=$request->input('details');
//dd($data);
       $data->save();
      //dd( $detail_name);
        // Detail::insert($photo);
        return redirect('detail_get');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function show(Detail $detail)
    {

$photos = Property::all();

$latestDetail = Detail::latest()->first();
$info = $latestDetail->datails;

$result2 = Property::select('name', 'price', 'type', 'photo_names', 'address','advert','currency','first_name','last_name', 'description')
    ->where('id', $info)
    ->get();

$result3 = Property::select('name', 'price', 'type', 'photo_names', 'address','advert', 'currency','description')
    ->orderBy('created_at', 'desc')
    ->take(1)
    ->get();
    
    $hot = Property::select('name', 'price', 'type', 'photo_names', 'address','currency')
    ->where('price', '>', 50000)
    ->get();

$array = [];
foreach ($result2 as $property) {
    $array[] = json_decode($property->photo_names);
}

//dd($info);

return view('property_details', ['result' => $array, 'results3' => $result3, 'photos' => $result2,'hot'=>$hot]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Detail $detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail $detail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail $detail)
    {
        //
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
     public function user (Request $request)
    {
        
        
          $names = $request->input('names');
  
 // dd($names);
    $firstName = $names[0]; 
    $secondName = $names[1]; 
        
          $user= $request->input('first_name');

      $data = DB::table('commisioners')
      ->where('id', $firstName)
      ->get();
      
       $commissioner = Commisioner::select('phone','first_name')
    ->where('id', $secondName )
    ->get();

       $photos = Property::all();

       $latestDetail = Detail::latest()->first();
       $info = $latestDetail->datails;

       $result2 = Property::select('name','id', 'price', 'type', 'photo_names', 'address','advert','currency','first_name','last_name', 'description')
    ->where('id', $secondName )
    ->get();

  $hot = Property::select('name', 'price', 'id','type', 'photo_names', 'address','currency')
    ->where('price', '>', 50000)
    ->get();
    
$result3 = Property::select('name', 'price','id', 'type', 'photo_names', 'address','advert', 'currency','description')
    ->orderBy('created_at', 'desc')
    ->take(1)
    ->get();

$array = [];
foreach ($result2 as $property) {
    $array[] = json_decode($property->photo_names);
}

//dd($data);

return view('details', ['result' => $array, 'results3' => $result3, 'photos' => $result2,'data'=>$data,'hot'=>$hot,'commisioner'=>$commissioner ]);

    }

    
}
