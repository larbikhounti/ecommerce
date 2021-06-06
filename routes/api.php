<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\ItemResource;
use App\Models\item;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/items', function() {
    return new ItemResource(item::with("category:name")->get());
});
Route::get('/item/{id}', function($id) {
    return new ItemResource(item::findorfail($id)->with("color","category","size","pictures")->get());
});
Route::get('/items/bycategory/{gender}', function($gender)  {
    if($category != ""){
       return new ItemResource(item::whereHas("category",function($q)  use($gender)
        {
            return $q->where("name",$gender);
        })->get());
    }else{
        return false;
    }
    
});
 // get items whom have category and sub catagory 
Route::get('/items/bysubcategory/{gender}/{category}', function($gender,$category)  {
    $filters = [$gender,$category];
    if($category != ""){
       return new ItemResource(item::whereHas("category",function($q)  use($filters)
        {
            return $q->where("gender",$filters[0])->where("name",$filters[1]);
        })->get());
    }else{
        return false;
    }
    
});




