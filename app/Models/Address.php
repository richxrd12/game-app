<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Address extends Model
{
    protected $fillable = [
        'country',
        'city',
        'postal_code',
        'street',
        'street_number',
        'floor',
        'door_number',
        'user_id'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
