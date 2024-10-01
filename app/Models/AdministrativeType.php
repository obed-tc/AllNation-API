<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdministrativeType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function regions()
    {
        return $this->hasMany(Region::class);
    }
}
