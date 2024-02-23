<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMagang extends Model
{
    protected $table="data_magangs";
    protected $primaryKey = 'nip';
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama',
        'email',
        'no_handphone',
        'password'
    ];
};
