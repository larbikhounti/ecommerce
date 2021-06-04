<?php
namespace App\Http\Controllers;

use App\Models\sizes;
use Illuminate\Http\Request;


class SizesController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    //
    public function index()
    {
        $all = sizes::all();
        # code...
        return view("sizes", ["all" => $all]);
    }

    public function delete($id)
    {
        # code...
        if (sizes::where('id', $id)->first() != null) {
            sizes::where('id', $id)->delete();
            return redirect("sizes");
        } else {
            return redirect("sizes");
        }
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $newname = $request->input('size');
        # code...

        if (sizes::where('id', $id)->first() != null) {
            $size = sizes::find($id);
            $size->name = $newname;
            $size->save();
            return redirect("sizes");
        } else {
            return redirect("sizes");
        }
    }

    public function add(Request $request)
    {
        
        $newsize = $request->input('size');
     
        # code...
            $size = new sizes();
            $size->name = $newsize;
            $size->save();
            return redirect("sizes");
        
    }
}
