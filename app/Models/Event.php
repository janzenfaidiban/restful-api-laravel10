<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Event extends Model
{
    use HasFactory;
    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'poster',
        'title',
        'caption',
        'publish',
    ];
    
    /**
     * poster
     *
     * @return Attribute
     */
    protected function poster(): Attribute
    {
        return Attribute::make(
            get: fn ($poster) => asset('/storage/events/' . $poster),
        );
    }

}
