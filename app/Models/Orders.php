<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $guarded;

    protected $with = ['transaction', 'product'];

    public function transaction()
    {
        return $this->hasOne(Transaction::class, 'order_id', 'id');
    }

    public function product()
    {
        return $this->hasOne(Products::class, 'id', 'product_id');
    }
}
