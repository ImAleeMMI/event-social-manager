<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'date', 'price', 'city', 'address', 'description', 'user_id'];

    //Relazione uno a molti con i prodotti
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    //Relazione uno a molti con gli utenti
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'subscriptions');
    }
}
