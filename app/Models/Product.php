<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use MyProjectVendor\PolymorphicImages\Models\Image;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price'];

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
}
