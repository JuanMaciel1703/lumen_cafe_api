<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function products() 
    {
        return $this->belongsToMany('App\Product', 'product_has_image', 'image_id', 'product_id');
    }
}