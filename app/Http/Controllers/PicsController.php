<?php

namespace App\Http\Controllers;

use App\Pic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PicsController extends Controller
{

    public function show(Pic $pic)
    {
        if($pic->creator_id !== auth()->user()->id){
            abort(404);
        }
        
        return view('show', compact('pic'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'image' => 'required|file|image|max:2048',
        ]);

       

        $path = $request->file('image')->store('public');
        
        $path = Storage::putFile('uploads', $request->file('image'));
        
        Pic::create([
            'name' => $request->name,
            'path' => $path,
            'creator_id' => auth()->user()->id
        ]);

        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pic  $pic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pic $pic)
    {
        //
    }
}
