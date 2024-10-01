<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'iso_code', 'phone_code'];
    public function regions()
    {
        return $this->hasMany(Region::class);
    }
}
