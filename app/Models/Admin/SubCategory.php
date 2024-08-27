<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'category_id',
        'action_date',
        'slug',
        'status' ,
        'meta_title' ,
        'meta_icon',
        'meta_keyword' ,
        'meta_description',
        'order_level',
        'created_by'
    ];

    static public  function getSubCategory(){
        return SubCategory::select('sub_categories.*', 'categories.name as category_name','users.name as user_name' )
                    // join categories and users table

                    ->join('categories', 'sub_categories.category_id', '=', 'categories.id')
                    ->join('users', 'sub_categories.created_by', '=', 'users.id')

                    ->orderBy('id', 'desc')
                    ->whereNull('sub_categories.deleted_at')
                    ->get();

    }

    static public  function getCategory(){
        return Category::select('categories.*')
                    ->orderBy('id', 'desc')
                    ->whereNull('deleted_at')
                    ->get();
    }

    static public function getSingleSubCategory($id){
        return SubCategory::find($id);
    }
}
