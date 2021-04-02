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
        $baseUrl =  URL::to("/") ;
        $secondary_images = [];
        
        if($request->primary_image){
            $primary_image = $baseUrl."/storage/".$request->primary_image->store('images',"public"); 
        }else if($request->secondary_images){
            foreach ($request->secondary_images as $key ) {
                $secondary_images[] = $baseUrl."/storage/".$key->store('images',"public");  
            }
        }

        $item = item::find($request->id);
        $item->title = Request("title");
        $item->descreption = Request("description");
        $item->slug = Request("slug");
        $item->price = Request("price");
        $item->quantity = Request("quantity");
        if($request->primary_image){
            $item->picture = $primary_image;
        }else{
            $item->picture =  $item->picture;
        }
        if($item->save()){
            if($request->colors){
                $item->color()->sync($request->colors);
            }
             else if($request->categories){
                $item->category()->sync($request->categories);
            }
            
           else if($request->secondary_images){
            foreach ($secondary_images as $picture) {
                $item->pictures()->update([
                    'item_id' => $request->id,
                    'image_path' =>  $picture,
                    
                  ]);
            }
           }    
           
        }
       return $this->index();
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
            
            $myitem =  item::find( $item->id);
            $myitem->color()->attach(Request("colors"));
            $myitem->category()->attach(Request("categories"));
            foreach ($secondary_images as $picture) {
                $item = new item();
                $myitem->pictures()->create([
                    'item_id' => $myitem,
                    'image_path' =>  $picture,
                    
                  ]);
            }
           
         
        }
  
        return  $this->index();
    }

    public function addItemPage()
    {
        # code...
        $colors = color::select("name","id")->get();
        $categories = Category::select("name","id")->get();
        
        
        return view("additem",["colors"=>$colors,"categories"=>$categories]);
    }

    public function updateItemPage($id)
    {
       
        $item= item::find($id);
        $secondary_images = $item->pictures()->get()->pluck("image_path");
        

       
        $colors = color::select("name","id")->get();
        $categories = Category::select("name","id")->get();
        return view("update_item",compact("id","categories","colors","secondary_images","item"));
   
    }
}
