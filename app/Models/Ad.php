<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    
    /**
     * Possible values for category column
     */
    const CATEGORY_VALUES = ['Accomodation', 'Fashion', 'Furniture', 'Jobs', 
                            'Leisure', 'Motors', 'Multimedia', 'Pets', 'Services'];

                            
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'category',
        'description',
        'picture',
        'price',
        'location',
        'user_id'
    ];

    public function scopeSearch($query)
    {
        return empty(request()->search) ? $query : $query->where('title', 'like', '%'.request()->search.'%');
    }

    public function scopeCategory($query)
    {
        return empty(request()->category) ? $query : $query->where('category', request()->category);
    }

    public function scopeMaxPrice($query)
    {
        return empty(request()->max_price) ? $query : $query->where('price', '<' , request()->max_price);
    }

    public function scopeMinPrice($query)
    {
        return empty(request()->min_price) ? $query : $query->where('price', '>' , request()->min_price);
    }
}
