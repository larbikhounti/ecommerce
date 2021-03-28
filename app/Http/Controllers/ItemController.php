<?php

namespace App\Http\Controllers;

use App\Models\item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    //
    public function index()
    {
        $all = item::all();
        # code...
        return view("items", ["all" => $all]);
    }

    public function delete($id)
    {
        # code...
        if (item::where('id', $id)->first() != null) {
            item::where('id', $id)->delete();
            return redirect("items");
        } else {
            return redirect("items");
        }
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $newname = $request->input('item');
        # code...

        if (item::where('id', $id)->first() != null) {
            $item = item::find($id);
            $item->name = $newname;
            $item->save();
            return redirect("item");
        } else {
            return redirect("items");
        }
    }

    public function add(Request $request)
    {
        
        $newitem = $request->input('item');
        # code...
            $item = new item();
            $item->name = $newitem;
            $item->save();
            return redirect("items");
        
    }
}
