<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model 
{
    protected $fillable = ['name', 'description', 'type', 'price', 'active'];

    public function images() 
    {
        return $this->belongsToMany('App\Image', 'product_has_image');
    }
}