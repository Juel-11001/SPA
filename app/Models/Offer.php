<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Offer extends Model
{
    protected $fillable = [
        'amount',
        'accepted_at',
        'declined_at',
    ];

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeMadeUser(Builder $query)
    {
        return $query->where('user_id', Auth::user()?->id);
    }
}
