<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function cats(){
        return $this->belongsTo(Category::class,'cat_id');
    }

    public function products(){
        return $this->hasMany(Product::class,'subcat_id');
    }
}
