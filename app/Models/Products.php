<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $guarded;

    protected $casts = [
        'images' => 'array',
    ];

    protected $with = ['fields', 'fieldss'];

    public function fields()
    {
        return $this->hasMany(CustomizableFields::class, 'product_id', 'id');
    }

    public function fieldss()
    {
        return $this->hasMany(CustomizableFields::class, 'product_id', 'id');
    }
}
