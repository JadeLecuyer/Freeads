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
}
