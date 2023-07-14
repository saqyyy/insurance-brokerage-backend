<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'customer_name',
        'premium',
        'customer_address',
        'policy_type',
        'insurer_name'
    ];

    public function client()
    {
        return $this->belongsTo(Policy::class, 'client_id', 'id');
    }

}