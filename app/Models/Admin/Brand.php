<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'action_date',

        'slug',
        'status',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'order_level',
        'created_by'
    ];
    static public  function getBrand(){
        return Brand::select('brands.*', 'users.name as user_name' )

                            ->join('users', 'brands.created_by', '=', 'users.id')

                            ->orderBy('id', 'desc')
                            ->whereNull('brands.deleted_at')
                            ->get();

    }
    static public function getSingleBrand($id){
        return self::find($id);
    }
}
