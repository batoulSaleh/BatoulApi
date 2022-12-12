<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productt extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'img',
        'price',
        'categoryy_id',
        'sales',
        'stock'
    ];

    public function categoryy(){
        return $this->belongsTo(Categoryy::class);
    }
}
