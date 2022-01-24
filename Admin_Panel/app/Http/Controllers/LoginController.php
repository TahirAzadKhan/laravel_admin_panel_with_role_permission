<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Session;


Session_start();


class LoginController extends Controller
{
    public function login(Request $request)
        {
            $user_email=$request->email;
            $user_password=$request->password;
            $result=User::where('user_email',$user_email)->where('user_password',$user_password)->first();


            if($result)
            {
                $users_permission = DB::select('select * from permission_tables where user_id ='.$result->user_id);

                Session::put('user_id',$result->user_id);
                Session::put('menu_id',$users_permission);

                return redirect('/dashboard');

            }
            else
            {
                Session::put('message','Invalid user');
                echo "failed";
                exit();
                return ('/');
            }

        }
        public function dashboard(Request $request)
        {

            if($request->session()->has('user_id'))
            {

                return view('dashboard');

            }
            else
            {

                echo 'error';
                exit();

            }
        }
        public function logout(Request $request)
        {
            $request->session()->forget('user_id');

            return redirect('/');
        }

}
