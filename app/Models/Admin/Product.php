<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;


    static function checkSlug($slug){
        return Product::where('slug', $slug)->count();
    }

    static public  function getProduct(){
        return Product::select('products.*', 'categories.name as category_name','sub_categories.name as sub_category_name','users.name as user_name' )
                    // join categories and users table

                    ->join('categories', 'products.category_id', '=', 'categories.id')
                    ->join('sub_categories', 'products.sub_category_id', '=', 'sub_categories.id')
                    ->join('users', 'products.created_by', '=', 'users.id')

                    ->orderBy('id', 'desc')
                    ->whereNull('products.deleted_at')
                    ->get();

    }


    static function getSingleProduct($id){
        return Product::find($id);
    }
}