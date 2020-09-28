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

class DataController extends Controller
{
     protected function submit_recipe(Request $request)
    {
    	$fileName = null;
    	 if ($request->hasFile('image')) {

            $file = $request->file('image');

            $fileName = Str::random(10) . '.png';
            Storage::disk('public')->put($fileName, file_get_contents($file));
         }

         DB::table('recipes')->insert(['name' => $request['name'], 'steps' => $request['summary-ckeditor'], 'video_url' => $request['video_url'], 'image' => $fileName]);

          return redirect()->to('/recipes');
    }

    protected function delete_recipe($id)
    {
        DB::table('recipes')->where('id', $id)->delete();
         return redirect()->to('/recipes');
    }

    protected function edit_recipe(Request $request)
    {
        $fileName = $request['imageOld'];
        $editor = "summary-ckeditor".$request['recipeId'];
        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $fileName = Str::random(10) . '.png';
            Storage::disk('public')->put($fileName, file_get_contents($file));
         }


         DB::table('recipes')->where('id', $request['recipeId'])->update(['name' => $request['name'], 'steps' => $request[$editor], 'video_url' => $request['video_url'], 'image' => $fileName]);

          return redirect()->to('/recipes');
    }

    protected function submit_playlist(Request $request){
        $file = $request->file('image');
        $fileName = Str::random(10) . '.png';
        Storage::disk('public')->put($fileName, file_get_contents($file));
         DB::table('playlists')->insert(['name' => $request['name'], 'description' => $request['description'], 'url' => $request['spotify'], 'image' => $fileName]);
         return redirect()->to('/playlists');
    }

    protected function edit_playlist(Request $request){
        $fileName = $request['imageOld'];
          if ($request->hasFile('image')) {

            $file = $request->file('image');

            $fileName = Str::random(10) . '.png';
            Storage::disk('public')->put($fileName, file_get_contents($file));
         }
          DB::table('playlists')->where('id', $request['playlistId'])->update(['name' => $request['name'], 'description' => $request['description'], 'url' => $request['spotify'], 'image' => $fileName]);
          return redirect()->to('/playlists');
    }

    protected function delete_playlist($id)
    {
        DB::table('playlists')->where('id', $id)->delete();
         return redirect()->to('/playlists');
    }

    protected function add_country(Request $request){
        DB::table('countries')->insert(['country' => $request['name']]);
         return redirect()->to('/locations');
    }

     protected function add_link(Request $request){
        DB::table('links')->insert(['name' => $request['name'], 'url' => $request['url'], 'country_id' => $request['country']]);
          return redirect()->back();
    }

    protected function edit_link(Request $request){
        DB::table('links')->where('id', $request['id'])->update(['name' => $request['name'], 'url' => $request['url']]);
         return redirect()->back();
    }

     protected function delete_link($id){
        DB::table('links')->where('id', $id)->delete();
         return redirect()->back();
    }

    protected function add_dept(Request $request){
        DB::table('department')->insert(['name' => $request['name']]);
          return redirect()->back();
    }

    protected function add_personel(Request $request){
        DB::table('personel')->insert(['name' => $request['name'], 'description' => $request['bio'], 'department_id' => $request['deptid']]);
        return redirect()->back();
    }

     protected function edit_personel(Request $request){
        DB::table('personel')->where('id', $request['id'])->update(['name' => $request['name'], 'description' => $request['bio']]);
         return redirect()->back();
    }

    protected function delete_personel($id){
        DB::table('personel')->where('id', $id)->delete();
         return redirect()->back();
    }
}
