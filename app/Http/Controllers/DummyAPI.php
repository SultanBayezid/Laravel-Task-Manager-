<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
class DummyAPI extends Controller
{
    public function dummy()
    {
       

   
      return $user;


    } //

    public function addDummy(Request $request)
    {
    //    return $request;
    //     return ["User save !!!"];
        $user = new Data();
        $user->name = $request->name;
        $user->phone = $request->phone;
       $data =  $user->save();


       if($data)
       {
           return ["User save !!!"];
       }
       else{
        return ["not user  save !!!"];
 
       }
      

    }

    public function Patients(Request $request)
    {
     
        $user = request('GET', 'http://localhost/ehr/public/api/patient/api')->json();

        return $user;

    }
}

