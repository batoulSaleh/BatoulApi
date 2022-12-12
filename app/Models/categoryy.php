<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoryy extends Model
{
    use HasFactory;
    protected $fillable=[
        'name'
    ];

    public function products(){
        return $this->hasMany(Productt::class);
    }
}
