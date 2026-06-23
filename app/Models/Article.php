<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
  protected $fillable = [
    'title',
    'image',
    'description',
    'price',
    'information',
    'code',
    'brand',
    'category',
    'subcategory'
];

public function orderItems()
{
    return $this->hasMany(OrderItem::class);
}
}

