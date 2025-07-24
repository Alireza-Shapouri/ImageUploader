<?php
namespace MyProjectVendor\PolymorphicImages\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['path', 'imageable_type', 'imageable_id'];
    public function imageable()
    {
        return $this->morphTo();
    }
}
