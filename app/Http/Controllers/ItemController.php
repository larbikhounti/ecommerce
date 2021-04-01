<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\color;
use App\Models\item;
use App\Models\Category;
use App\Models\category_item;
use App\Models\color_item;
use App\Models\item_pictures;
use Dotenv\Store\File\Paths;
use Facade\FlareClient\Stacktrace\File;
use Faker\Provider\Uuid;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use League\CommonMark\Inline\Element\Strong;

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
      
    }

    public function add(Request $request)
    {
        //'avatar' => 'dimensions:min_width=100,min_height=200'
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'slug' => 'required',
            'price' => 'required|regex:/^\d.\d/',
            'quantity' => 'required|integer',
            'primary_image' => 'required|image|mimes:jpeg,png,jpg,svg',
            'secondary_images.*' => 'required|image|mimes:jpeg,png,svg',
            
        ]);
       
        $baseUrl =  URL::to("/") ;
        $secondary_images = [];
        $primary_image = $baseUrl."/storage/".$request->primary_image->store('images',"public"); 

        foreach ($request->secondary_images as $key ) {
            $secondary_images[] = $baseUrl."/storage/".$key->store('images',"public");  
        }
      
        $item = new item();
        $item->title = Request("title");
        $item->descreption = Request("description");
        $item->slug = Request("slug");
        $item->price = Request("price");
        $item->quantity = Request("quantity");
        $item->picture =  $primary_image;

        if($item->save()){
            
            $id = $item->id;
            
            foreach (Request("colors") as $color => $value) {
                $color_item = new color_item();
                $color_item->color_id = $value;
                $color_item->item_id = $id;
                $color_item->save();
            }
            foreach (Request("categories") as $category => $value) {
                $category_item = new category_item();
                $category_item->category_id = $value;
                $category_item->item_id = $id;
                $category_item->save();
             
            }
            foreach ($secondary_images as $pic ) {
                $item_pictures = new item_pictures();
                $item_pictures->image_path = $pic;
                $item_pictures->item_id = $id;
                $item_pictures->save();
             
            }
           
            
            redirect()->route('items');
        }
  
        
    }

public function addItemPage()
{
    # code...
    $colors = color::select("name","id")->get();
    $categories = Category::select("name","id")->get();
    
    
    return view("additem",["colors"=>$colors,"categories"=>$categories]);
}
}
