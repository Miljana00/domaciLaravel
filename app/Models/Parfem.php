<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parfem extends Model
{
    use HasFactory;

    protected $table = 'parfemi';

    protected $fillable = ['naziv', 'proizvodjacID', 'polID', 'cena'];
}
