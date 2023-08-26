<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class countrystate extends Model
{
    use HasFactory;
    protected $table = 'countrystate';
    protected $fillable = ['Country','State','City'];
}
