<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends Model
{

    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'beds',
        'bath',
        'area',
        'city',
        'code',
        'street',
        'street_number',
        'price'
    ];
    protected $sortable=[
        'price', 'created_at'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(ListingImage::class);
    }
    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
        public function scopeMostRecent(Builder $query) : Builder
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeFilter(Builder $query, array $filters) : Builder
    {
        return $query->when($filters['priceFrom'] ?? false,
                fn($query, $value) => $query->where('price', '>=', $value))
            ->when($filters['priceTo'] ?? false,
                fn($query, $value) => $query->where('price', '<=', $value))
            ->when($filters['beds'] ?? false,
                fn($query, $value) => $query->where('beds',(int) $value< 6 ? '=' : '>=', $value))
            ->when($filters['baths'] ?? false,
                fn($query, $value) => $query->where('bath',(int) $value < 6 ? '=' : '>=', $value))
            ->when($filters['areaFrom'] ?? false,
                fn($query, $value) => $query->where('area', '>=', $value))
            ->when($filters['areaTo'] ?? false,
                fn($query, $value) => $query->where('area', '<=', $value))
            ->when($filters['deleted'] ?? false,
                fn($query, $value) => $query->withTrashed())
            ->when($filters['by'] ?? false,
                fn($query, $value)=> !in_array($value, $this->sortable) ? $query :  $query->orderBy($value, $filters['order'] ?? 'desc'));
    }

}
