<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'date', 'price', 'city', 'address', 'description'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
