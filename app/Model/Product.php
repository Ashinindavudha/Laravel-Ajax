<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'detail'];

    public function categories()
{
    return $this->belongsToMany(Category::class);
}

}
