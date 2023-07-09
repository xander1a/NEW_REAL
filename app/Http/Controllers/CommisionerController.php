<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Commisioner;
use Illuminate\Http\Request;
use App\Models\Property;

class CommisionerController extends Controller
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
         $data = new Commisioner();
    $data->first_name = $request->input('first_name');
    $data->last_name = $request->input('last_name');
    $data->email = $request->input('email');
    $data->phone = $request->input('phone');
    $data->type=$request->input('type');
    $data->password = Hash::make($request->input('password'));
    
    $data->save();
    return redirect()->back()->with('success', 'You have registered successfully! Now you can login');
    }
    
    
    public function login(Request $request)
{
    $name = $request->input('first_name');
    $password = $request->input('password');
    
    $user = Commisioner::where('first_name', $name)->first();

    if ($user && Hash::check($password, $user->password)) {
   
         $data = DB::table('commisioners')->where('first_name', $name)->get();
           $photos = Property::orderBy('created_at', 'desc')->get();
        $results = Property::select('name', 'price', 'type', 'photo_names', 'address')
        ->where('advert', 'sale')
        ->get();
        
         $hot = Property::select('name', 'price', 'type', 'photo_names', 'address','currency')
    ->where('price', '>', 50000)
    ->get();

        $results2 =Property::select('name', 'price', 'type', 'photo_names', 'address')
       ->where('advert', 'rent')
      ->get();
//dd($data);
              return view('use_home', compact('photos','results','results2','data','hot'));

    
    
    
    
    
    
    
        
        
        
        
        /// $user = Commisioner::where('first_name', $name)->get();

          //  return view('registered', ['data' => $user]);

    } else {
        // Authentication failed
        return redirect('/')->with('error', 'Invalid login credentials');
    }
}
         
         
   
    
    
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commisioner  $commisioner
     * @return \Illuminate\Http\Response
     */
  public function show(Request $request)
{
    $user = $request->input('first_name');
    $data = DB::table('commisioners')->where('first_name', $user)->get();
    $users = DB::table('properties')->where('first_name', $user)->get();

    if ($users->isNotEmpty()) {
       // dd($users);
        return view('user_data_mng', compact('data', 'users'));
    } else {
       // dd($data);
        return view('no_post', compact('data'));
    }
}


    
    
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commisioner  $commisioner
     * @return \Illuminate\Http\Response
     */
    public function edit(Commisioner $commisioner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Commisioner  $commisioner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commisioner $commisioner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commisioner  $commisioner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commisioner $commisioner)
    {
        //
    }
}
