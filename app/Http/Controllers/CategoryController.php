<?php

namespace App\Http\Controllers;

use App\Models\category;

use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth");
    }

    //
    public function index()
    {
        $all = category::all();
        # code...
        return view("category", ["all" => $all]);
    }

    public function delete($id)
    {
        # code...
        if (category::where('id', $id)->first() != null) {
            category::where('id', $id)->delete();
            return redirect("Category");
        } else {
            return redirect("Category");
        }
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $newname = $request->input('category');
        # code...

        if (category::where('id', $id)->first() != null) {
            $category = category::find($id);
            $category->name = $newname;
            $category->save();
            return redirect("Category");
        } else {
            return redirect("Category");
        }
    }

    public function add(Request $request)
    {
        
        $newCategory = $request->input('category');
        # code...
            $category = new category();
            $category->name = $newCategory;
            $category->save();
            return redirect("Category");
        
    }
}
