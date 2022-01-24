<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Permission_table;
use Illuminate\Support\Facades\DB;
use Session;
Session_start();

class MenuBController extends Controller
{
    public function showDataUpdatable($user_id=null,Request $request)
    {
        if($request->session()->has('user_id'))
        {

            $value = $request->session()->get('user_id');
            $users_permission = DB::table('permission_tables')
            ->where('user_id', '=', $value)
            ->where('menu_id', '=', 2)
            ->where('permission_category', '=', 2)
            ->get();
            if($users_permission->isEmpty())
            {
                echo 'you dont have permission';
            }
            else
            {
                $showdata= User::all();
                return view('menub',compact('showdata'));
            }
        }
        else
        {
            echo 'error';
            exit();
        }
    }
    public function editData($user_id=null,Request $request)
    {
        if($request->session()->has('user_id'))
        {

            $value = $request->session()->get('user_id');
            $users_permission = DB::table('permission_tables')
            ->where('user_id', '=', $value)
            ->where('menu_id', '=', 2)
            ->where('permission_category', '=', 2)
            ->get();
            if($users_permission->isEmpty())
            {
                echo 'you dont have permission';
            }
            else
            {

                //$editdata2 = Permission_table::find($user_id);
                $editdata = User::find($user_id);
                $showdata = DB::select('select * from menu_tables');

                return view('menubedit',compact('editdata'))->with('showData',$showdata);
            }
        }
        else
        {
            echo 'error';
            exit();
        }
    }
    public function updateData(Request $request,$user_id)
    {
        $rules =
        [
            'user_name'=>'required|max:20',
            'user_email'=>'required|email',
            'user_password'=>'required|max:20',

        ];

        $this->validate($request,$rules);
        $crud = User::find($user_id);
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
        Session::flash('msg','Successfully Updated');
        return redirect()->back();
    }
    public function deleteData($user_id=null,Request $request)
    {
        if($request->session()->has('user_id'))
        {
            $value = $request->session()->get('user_id');
            $users_permission = DB::table('permission_tables')
            ->where('user_id', '=', $value)
            ->where('menu_id', '=', 2)
            ->where('permission_category', '=', 2)
            ->get();

            if($users_permission->isEmpty())
            {
                   echo 'you dont have permission';
            }
            else
            {
                $deleteData = User::find($user_id);
                $deleteData->delete();
                Session::flash('msg','Successfully Deleted');
                return redirect()->back();
            }
        }
        else
        {

            echo 'error';
            exit();

        }

    }
    public function showPermission($user_id=null,Request $request)
    {
        if($request->session()->has('user_id'))
        {
            $value = $request->session()->get('user_id');
            $users_permission = DB::table('permission_tables')
            ->where('user_id', '=', $value)
            ->where('menu_id', '=', 2)
            ->where('permission_category', '=', 2)
            ->get();

            if($users_permission->isEmpty())
            {
                   echo 'you dont have permission';
            }
            else
            {
                $value = $request->session()->get('user_id');

                return DB::table('menu_tables')
                ->join('permission_tables', 'permission_tables.menu_id', '=', 'menu_tables.menu_id')
                ->select('menu_tables.menu_name','permission_tables.permission_category')
                ->where('permission_tables.user_id','=',$value)
                ->get();


            }
        }
        else
        {

            echo 'error';
            exit();

        }

    }

}
