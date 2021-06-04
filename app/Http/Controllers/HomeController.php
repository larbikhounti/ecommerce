<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\color;
use App\Models\item;
use App\Models\sizes;
use Illuminate\Http\Request;


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
       $totalOfItems = collect(item::select("id")->get())->count();
       $totalOfcategories = collect(category::select("id")->get())->count();
       $totalOfColors = collect(color::select("id")->get())->count();
       $totalOfSizes = collect(sizes::select("id")->get())->count();
        return view('home',compact("totalOfItems","totalOfcategories","totalOfColors","totalOfSizes"));
    }

    public function countClients()
    {
      
    }
}
