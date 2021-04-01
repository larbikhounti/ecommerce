<?php

namespace Database\Seeders;

use App\Models\category;
use App\Models\color;
use App\Models\item;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->addColors();
        $this->addCategories();
        $this->additems();
            
    }

    public function addColors()
    {
        $color = new color();
        $color->name = "black";
        $color->save();
        $color = new color();
        $color->name = "white";
        $color->save();
        $color = new color();
        $color->name = "white";
        $color->save();
        $color->name = "orange";
        $color->save();
    }
    public function addCategories()
    {
        $category = new category();
        $category->name = "hats";
        $category->save();
        $category = new category();
        $category->name = "tops";
        $category->save();
        $category = new category();
        $category->name = "jeans";
        $category->save();
        $category = new category();
        $category->name = "t-shirts";
        $category->save();
    }
    public function additems()
    {
        $item = new item();
        $item->title = "sweet hat for summer";
        $item->descreption = "hat that can protect you from the sun";
        $item->price = 99.99;
        $item->picture = "http://exmaple.com";
        $item->slug = "this-is-a-good-hat";
        $item->quantity =10;
        $item->created_at = now();
        $item->updated_at = now();
        $item->save();
     
    }
}
