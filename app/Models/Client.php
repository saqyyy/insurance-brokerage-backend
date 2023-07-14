<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','description'
    ];

    public function policies()
    {
        return $this->hasMany(Policy::class,'client_id','id');
    }
    
}
