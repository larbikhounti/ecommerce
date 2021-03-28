<?php

namespace App\Http\Controllers;

use App\Models\color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    //
    public function index()
    {
        $all = color::all();
        # code...
        return view("colors", ["all" => $all]);
    }

    public function delete($id)
    {
        # code...
        if (color::where('id', $id)->first() != null) {
            color::where('id', $id)->delete();
            return redirect("colors");
        } else {
            return redirect("colors");
        }
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $newname = $request->input('color');
        # code...

        if (color::where('id', $id)->first() != null) {
            $color = color::find($id);
            $color->name = $newname;
            $color->save();
            return redirect("color");
        } else {
            return redirect("colors");
        }
    }

    public function add(Request $request)
    {
        
        $newcolor = $request->input('color');
        # code...
            $color = new color();
            $color->name = $newcolor;
            $color->save();
            return redirect("colors");
        
    }
}
