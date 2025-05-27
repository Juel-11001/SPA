<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ListingImage extends Model
{
    protected $fillable=[
        'image'
    ];
    protected $appends=[
        'src'
    ];

    public function listing() : BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }
    /** generate image src */
    public function getSrcAttribute()
    {
        return asset("storage/{$this->image}");
    }
}
