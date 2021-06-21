<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeAbout;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    

    public function HomeAbout()
    {
        $homeabout = HomeAbout::latest()->get();
        return view('admin.about.index',compact('homeabout'));
    }


    public function AddAbout(){
        return view('admin.about.create');
    }


    public function StoreAbout(Request $request)
    {
        HomeAbout::insert([
            'title' => $request->title,
            'short_disc' => $request->short_disc,
            'long_disc' => $request->long_disc,
            'created_at' => Carbon::now(),
        ]);

        return Redirect()->route('home.about')->with('success','About insertado correctamente');
    }


    public function EditAbout($id)
    {
        $abouts = HomeAbout::findOrFail($id);
        return view('admin.about.edit',compact('abouts'));
    }


    public function UpdateAbout(Request $request, $id)
    {
        $update = HomeAbout::findOrFail($id)->update([
            'title' => $request->title,
            'short_disc' => $request->short_disc,
            'long_disc' => $request->long_disc,
            'user_id' => Auth::user()->id,
        ]);
        return Redirect()->route('home.about')->with('success','About actualizado correctamente');
    }

    public function DeleteAbout($id){

        HomeAbout::findOrFail($id)->delete();
        return Redirect()->back()->with('success','About Eliminado correctamente');
    }

}
