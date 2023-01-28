<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function subCategory()
    {
        return $this->belongsTo(Category::class,'sub_category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function addons()
    {
        return $this->hasMany(Addon::class,'service_id');
    }
}
