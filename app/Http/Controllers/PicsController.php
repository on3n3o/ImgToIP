<?php

namespace App\Http\Controllers;

use App\Pic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PicsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = $request->file('image')->store('public');
        
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
