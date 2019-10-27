<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pic;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pics = Pic::query();

        if(!auth()->user()->is_admin){
            $pics = $pics->where('creator_id', auth()->user()->id);
        }
        $pics = $pics->paginate(10);

        return view('home', compact('pics'));
    }
}
