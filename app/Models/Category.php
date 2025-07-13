<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // لا تحدد primaryKey لأنه بالفعل 'id' وهو الافتراضي
    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
        // هنا 'category_id' هو المفتاح الأجنبي في جدول products
    }
}
