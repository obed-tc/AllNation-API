<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    // Define los atributos que se pueden llenar
    protected $fillable = [
        'country_id',
        'administrative_type_id',
        'name',
    ];

    // Relación con el modelo Country
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    // Relación con el modelo AdministrativeType
    public function administrativeType()
    {
        return $this->belongsTo(AdministrativeType::class);
    }
}
