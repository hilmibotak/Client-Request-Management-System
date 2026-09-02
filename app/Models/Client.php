<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'address',
        'status',
    ];

    /**
     * Relationship: a client has many requests.
     * Ready for future module development.
     */
    public function requests()
    {
        return $this->hasMany(Request::class);
    }
}
