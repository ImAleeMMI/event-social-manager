<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'price','description', 'materials', 'weight', 'event_id'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
