<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Banner;
use File;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banner.index')->with(compact('banners'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //guarda imagen en el proyecto
        $file = $request->file('photo');
        $path = public_path() . '/images/banners';
        $fileName = uniqid() . $file->getClientOriginalName();
        $moved = $file->move($path, $fileName);

        //guarda en db
        if($moved){
            $banner = new Banner();
            $banner->image = $fileName;
            $banner->save();
            
        }
        return back();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        $banner = Banner::find($id);
        if(substr($banner->image, 0, 4) === "http"){
            $deleted = true;
        }else{
            $fullPath = public_path() . '/images/banners/' . $banner->image;
            $deleted = File::delete($fullPath);
        }

        if($deleted){
            $banner->delete();
        }

        return back();
    }    
}
