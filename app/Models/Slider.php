<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends Model
{
    use HasFactory;

    protected $fillable = [
        'heading',
        'title',
        'description',
        'link',
        'type'
    ];


    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
