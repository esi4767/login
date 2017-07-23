<?php

namespace Teknoto\Login\Controllers;

use Illuminate\Http\Request;
use Teknoto\Login\Users;
use Illuminate\Routing\Controller;



class LoginController extends Controller
{
    public function showlogin()
     {
         $test=config('MyConfig.SiteName');
         return view('teknotoview::login',compact('test'));
     }
     public function Checklogin(Request $request)
     {
        /* $this->validate($request, [
             'username' => 'required|unique:users',
             'password' => 'required',
         ]);*/

         $re=Users::where('username','=',$request->username)
             ->where('password','=',$request->password)
             ->select('username', 'id')->get();
         if(!empty($re[0]['username']))
         {
            $error="Valid";
         }
         else  $error='Invalid';
         $arr[]=array('result'=>$error);
         echo json_encode($arr);

     }
}
