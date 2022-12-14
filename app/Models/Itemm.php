<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itemm extends Model
{
    use HasFactory;

    protected $fillable = [
        'productt_id',
        'orderr_id', 
        'cartt_id',
        'quantity'
    ];

    public function productt(){
        return $this->belongsTo(Productt::class);
    }

}
