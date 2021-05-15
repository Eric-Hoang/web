<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    use HasFactory;

    protected $casts = [
        'screen_shot' => 'array'
    ];

    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getDownloadCountAttribute($val)
    {
        return number_format($val);
    }

    public function avgRate()
    {
        return $this->comments()->avg("rate");
    }

    // public function getAvgRateAttribute()
    // {
    //     if (!array_key_exists('avgRate', $this->relations)) {
    //         $this->load('avgRate');
    //     }

    //     $relation = $this->getRelation('avgRate')->first();

    //     return ($relation) ? $relation->aggregate : null;
    // }
}
