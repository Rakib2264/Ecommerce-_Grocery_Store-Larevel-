<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function cats(){
        return $this->belongsTo(Category::class,"cat_id");
    }
    public function subcats(){
        return $this->belongsTo(SubCategory::class,"subcat_id");
    }
    public function brands(){
        return $this->belongsTo(Brand::class,"brand_id");
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }
    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcat_id');
    }
}
