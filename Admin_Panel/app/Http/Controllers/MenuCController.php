<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Permission_table;
use Session;
Session_start();

class MenuCController extends Controller
{
    public function addData(Request $request)
    {
        if($request->session()->has('user_id'))
        {
            $value = $request->session()->get('user_id');
            $users_permission = DB::table('permission_tables')
            ->where('user_id', '=', $value)
            ->where('menu_id', '=', 3)
            ->where('permission_category', '=', 2)
            ->get();
            if($users_permission->isEmpty())
            {
                   echo 'you dont have permission';
            }
            else
            {
                $showdata = DB::select('select * from menu_tables');
                return view('menuc')->with('showData',$showdata);

            }
        }
        else
        {

            echo 'error';
            exit();

        }

    }
    public function storeData(Request $request)
    {
        $rules =
        [
            'user_name'=>'required|max:20',
            'user_email'=>'required|email',
            'user_password'=>'required|max:20',
        ];
        $this->validate($request,$rules);
        $crud = new User();
        $crud->user_name=$request->user_name;
        $crud->user_email=$request->user_email;
        $crud->user_password=$request->user_password;
        $crud->save();
        $lastId = $crud->user_id;

        $crud2 = new Permission_table();
        $crud2->permission_category=$request->cat3;
        $crud2->user_id =$lastId;
        $crud2->menu_id =$request->permission3;


        $crud2->save();




        Session::flash('msg','Successfully Added');

           return redirect()->back();
    }
}
