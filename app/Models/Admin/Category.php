<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',


                'status' ,
                'meta_title' ,
                'meta_icon',
                'meta_keyword' ,
                'meta_description',
                'order_level',
                'created_by'
    ];
    static public  function getCategory(){
        return Category::select('categories.*')
                    ->orderBy('id', 'desc')
                    ->whereNull('deleted_at')
                    ->get();
    }

    static public function getSingleCategory($id){
        return Category::find($id);
    }
}
