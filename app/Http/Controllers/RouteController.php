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
use Illuminate\Support\Str;
use File;
use Storage;

class RouteController extends Controller
{
     protected function recipes()
    {
    	
    	$recipes = DB::table('recipes')->get();
         return view('pages.recipes')->with('recipes', $recipes);
    }

    protected function playlists()
    {
    	
    	$playlists = DB::table('playlists')->get();
         return view('pages.playlists')->with('playlists', $playlists);
    }

    protected function locations()
    {	
    	$countries = DB::table('countries')->get();
    	// $data = array();
    	// foreach ($countries as $country) {
    	// 	$links = DB::table('links')->where('country_id', $country->id)->get();
    	// 	array_push($data, array('id' => $country->id,'name' => $country->country, 'links' => json_decode(json_encode($links), true)));
    	// }
         return view('pages.locations')->with('data',  json_decode(json_encode($countries), true))->with('content', json_decode(json_encode($countries), true));
    }

    protected function links($id){
        $links = DB::table('links')->where('country_id', $id)->get();
        $country = DB::table('countries')->where('id', $id)->first();
        return view('pages.links')->with('links', $links)->with('country', $country);
    }

    protected function teams(){
    	$countries = DB::table('department')->get();
    	return view('pages.teams')->with('data',  json_decode(json_encode($countries), true))->with('content', json_decode(json_encode($countries), true));
    }

    protected function personel($id){
        $personel = DB::table('personel')->where('department_id', $id)->get();
        $department = DB::table('department')->where('id', $id)->first();
        return view('pages.personel')->with('personel', $personel)->with('dept', $department);
    }
    
}
