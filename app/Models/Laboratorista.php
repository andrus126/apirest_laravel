<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;


class Laboratorista extends Model
{
    use HasFactory, HasApiTokens;

    protected $table = 'laboratoristas';

    protected $fillable = [
        'user_id',
        'nombre',
        'ci',
        'especialidad'
    ];

    public $timestamps = false;

}
