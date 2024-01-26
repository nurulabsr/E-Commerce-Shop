<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChildCategory extends Model
{
    use HasFactory, SoftDeletes;

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subCategory(){
        return $this->belongsTo(SubCategory::class);
    }
}
