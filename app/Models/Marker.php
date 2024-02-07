<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marker extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'color'];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
