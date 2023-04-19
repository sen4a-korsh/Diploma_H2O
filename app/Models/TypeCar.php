<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeCar extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_name',
        'lead_time',
        'created_at',
        'updated_at',
    ];

}
