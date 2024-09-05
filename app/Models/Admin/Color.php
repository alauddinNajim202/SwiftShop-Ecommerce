<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Color extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'color_name',
        'color_code',
        'status',
        'created_by'
    ];
    static public  function getColor()
    {
        return Color::select('colors.*','users.name as user_name')
            ->join('users', 'colors.created_by', '=', 'users.id')
            ->orderBy('id', 'desc')
            ->whereNull('colors.deleted_at')
            ->get();
    }

    static public function getSingleColor($id)
    {
        return Color::find($id);
    }
}
