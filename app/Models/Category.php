<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function services()
    {
        return $this->hasMany(Service::class,'category_id')->where('status',1);
    }

    public function servicessub()
    {
       return $this->hasMany(Service::class,'sub_category_id');
    }
}
