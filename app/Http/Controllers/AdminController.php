<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Log;
use Redirect;
use Auth;
use Session;
use URL;
use App\User;
use View;

class AdminController extends Controller
{
    protected function login(Request $data)
    {
    	if (Auth::attempt(['email' => $data->email, 'password' => $data->password])) {
            $user = User::where('email', $data->email)->first();
            Auth::login($user);
            return redirect()->to('/admin/dashboard');
        }else{
        	return Redirect::back()->with('error_code', 2);
        }
    }

    protected function register(Request $data)
    {
        User::insert(['name' => $data->name, 'email' => $data->email, 'password' => bcrypt($data->password)]);
        return redirect('/');
    }

    protected function get_data(){
        // $data = DB::table("pledges")->get();
        // return view::make('dashboard')->with('data', $data);
        return view::make('dashboard');
    }

    protected function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }


     protected function delete($id)
    {
         DB::table("pledges")->where('id', $id)->delete();
         return redirect()->to('/admin/dashboard');
    }
}
