<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function login(Request $request){

$username='Admin';
$password='1234';


$name=$request->input('name');
$pass=$request->input('pass');



if($username== $name && $password==$pass){

   // dd($name);
return redirect('mng');


}

else{

    return  redirect()->back()->with('error','The credential input is incorrect');
}




    }
}
