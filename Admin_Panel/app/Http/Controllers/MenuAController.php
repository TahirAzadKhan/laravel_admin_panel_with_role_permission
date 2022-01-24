<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Session;
Session_start();

class MenuAController extends Controller
{
    public function showData(Request $request)
    {
        if($request->session()->has('user_id'))
        {
            $value = $request->session()->get('user_id');
            $users_permission = DB::table('permission_tables')
            ->where('user_id', '=', $value)
            ->where('menu_id', '=', 1)
            ->get();
            if($users_permission->isEmpty())
            {
                echo 'you dont have permission';
            }
            else
            {
                $showdata = User::all();
                return view('menua', compact('showdata'));
            }
        }
        else
        {
            echo 'error';
            exit();
        }
    }
}
