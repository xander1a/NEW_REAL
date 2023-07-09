<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Property;
use App\Models\Commisioner;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class PropertyController extends Controller
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
    // Validate the form data
    // $request->validate([
    //     'name' => 'required',
    //     'price' => 'required',
    //     'address' => 'required',
    //     'village' => 'required',
    //     'type' => 'required',
    //     'advert' => 'required',
    //     'description' => 'required',
    //     'file' => 'required|array',
    //     'file.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    // ]);

    // Upload and store the photos
    $photo_names = [];
    $photo_paths = [];

    foreach ($request->file('file') as $photo) {
        $filename = $photo->getClientOriginalName();
        $filepath = $photo->move('photos', $filename);
        $photo_names[] = $filename;
        $photo_paths[] = $filepath->getPathname();
    }

    // Create a new property record
    $property = new Property();
    $property->first_name = $request->input('first_name');
    $property->last_name = $request->input('last_name');
    $property->name = $request->input('name');
    $property->price = $request->input('price');
    $property->currency = $request->input('currency');
    $property->address = $request->input('address');
    $property->village = $request->input('village');
    $property->type = $request->input('type');
    $property->advert = $request->input('advert');
    $property->description = $request->input('description');
    $property->photo_names = json_encode($photo_names); // Convert to JSON string
    $property->photo_paths = json_encode($photo_paths); // Convert to JSON string
   // dd($property);
    $property->save();

    $user = Commisioner::where('first_name', $request->input('first_name'))->get();
    
    if ($property->id) {
        return view('registered', ['data' => $user])->with('success', 'Your data submitted successfully!');
    } else {
        return redirect()->back()->with('error', 'An error occurred during data submission.');
    }
}



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        // $photos = Property::all();
   $photos = Property::orderBy('created_at', 'desc')->get();

// $lastData = ModelName::latest()->first();


        $results = Property::select('name', 'price','id', 'type', 'photo_names', 'address')
        ->where('advert', 'sale')
        ->get();
        
    $hot = Property::select('name', 'price','id', 'type', 'photo_names', 'address','currency')
    ->where('price', '>', 800)
    ->get();



          $results2 =Property::select('name', 'price', 'type', 'photo_names', 'address')
    ->where('advert', 'rent')
    ->get();

             // dd($photos);
            // foreach($results as $photoss)

            // $array = json_decode($photoss->file_name);
            //   $array1=$array[0];

            //   dd( $array1);
            
            
            
                return view('welcome', compact('photos','results','results2','hot'));
    }
    
     public function listed(Property $property)
    {
        // $photos = Property::all();
   $photos = Property::orderBy('created_at', 'desc')->get();

// $lastData = ModelName::latest()->first();


        $results = Property::select('name', 'price', 'type', 'photo_names', 'address')
        ->where('advert', 'sale')
        ->get();

  $hot = Property::select('name', 'price', 'type', 'photo_names', 'address')
    ->where( 'price', '>', 700)
    ->get();

        
          $results2 =Property::select('name', 'price', 'type', 'photo_names', 'address')
    ->where('advert', 'rent')
    ->get();

             // dd($photos);
            // foreach($results as $photoss)

            // $array = json_decode($photoss->file_name);
            //   $array1=$array[0];

            //   dd( $array1);
            $data="Login";
            
            
                return view('buysalerent_data', compact('photos','results','results2','data','hot'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    
    {

$user= $request->input('update');

$data = DB::table('properties')->where('first_name', $user)->get();


return view('property_update', compact('data'));


    }
    
    
    
        public function user(Request $request)
    
    {

      $data= $request->input('home');

      $data = DB::table('commisioners')->where('first_name', $data)->get();
      $photos = Property::orderBy('created_at', 'desc')->get();


 $hot = Property::select('name','id', 'price', 'type', 'photo_names', 'address','currency')
    ->where('price', '>', 50000)
    ->get();


     $results = Property::select('name', 'price', 'type', 'photo_names', 'address')
        ->where('advert', 'sale')
        ->get();

    $results2 =Property::select('name', 'price', 'type', 'photo_names', 'address')
    ->where('advert', 'rent')
    ->get();
//dd($hot);
              return view('use_home', compact('photos','results','results2','data','hot'));


    }
    
    
    
    
    
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
  public function update(Request $request, $propertyId)
{
    $property = Property::find($propertyId); // Assuming $propertyId is the ID of the property you want to update

    if ($property) {
        $property->first_name = $request->input('first_name');
        $property->last_name = $request->input('last_name');
        $property->name = $request->input('name');
        $property->price = $request->input('price');
        $property->currency = $request->input('currency');
        $property->address = $request->input('address');
        $property->village = $request->input('village');
        $property->type = $request->input('type');
        $property->advert = $request->input('advert');
        $property->description = $request->input('description');
       
        $property->save();
        
        
            $users = DB::table('properties')->where('name', $request->input('name'))->get();

          //return view('property_update', compact('users'))->with('success', 'Property updated successfully.');
           // return view('property_update', compact('users', 'success'))->with('success', 'Property updated successfully.');
            return view('property_update')->with('users', $users)->with('success', 'Property updated successfully.');


    } else {
        // Handle the case where the property with the given ID is not found
        // return redirect()->back()->with('error', 'Property not found.');
    }
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $property = Property::findOrFail($id);
          $property->delete();

          return redirect()->back()->with('success', 'Property deleted successfully');
        
        
        
    }
    
      public function post_form(Request $request)
{
    $user = $request->input('first_name');
    $data = DB::table('commisioners')->where('first_name', $user)->get();


//dd($data);
    return view('registered', compact('data'));
}

public function search(Request $request)
{
    
     $hot = Property::select('name', 'price','id', 'type', 'photo_names', 'address','currency')
    ->where('price', '>', 800)
    ->get();
    
    
    $search = $request->input('search');
    $type = $request->input('type');
    $price = $request->input('price');
    $property = $request->input('property');

    $query = Property::query();

    if ($search) {
        $query->where('name', 'like', '%' . $search . '%')
              ->orWhere('price', 'like', '%' . $search . '%')
               ->orWhere('currency', 'like', '%' . $search . '%')
               ->orWhere('village', 'like', '%' . $search . '%')
               ->orWhere('type', 'like', '%' . $search . '%')
               ->orWhere('address', 'like', '%' . $search . '%')
               ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhere('advert', 'like', '%' . $search . '%');
                
    }

    if ($type) {
        $query->where('price', $type);
    }

    if ($price) {
        $priceRange = explode('-', $price);
        $minPrice = $priceRange[0];
        $maxPrice = $priceRange[1] ?? null;

        $query->whereBetween('price', [$minPrice, $maxPrice]);
    }

    if ($property) {
        $query->where('type', $property);
    }

    $results = $query->get();
    
    $photos=$results;

  return view('welcome', compact('photos','hot'));
  
  //  return view('search-results', compact('photos'));
}

}
