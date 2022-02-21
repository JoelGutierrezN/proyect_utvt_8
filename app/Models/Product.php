<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected $fillable = [
        'code',
        'slug',
        'name',
        'stock',
        'provider_price',
        'shop_price',
        'description',
        'image',
        'user_id'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function user(){
        return $this->hasOne(User::class);
    }

    public function getGetDescriptionAttribute()
    {
        return substr($this->description, 0 , 255);
    }

}
