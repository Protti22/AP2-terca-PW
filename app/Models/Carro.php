<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    protected $fillable = [
        'placa',
        'quilometragem',
        'modelo',
        'marca'];
}
