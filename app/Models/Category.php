<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class,'cat_id','id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'cat_id');
    }
}
