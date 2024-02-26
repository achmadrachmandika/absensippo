<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absenPulang extends Model
{
    use HasFactory;

    protected $table = 'absen_pulang';

    protected $fillable = [

        'user_id',
        'nim',
        'sekolah',
        'nama',
        'status',
        'tanggal',
        'jam',
        'longitude',
        'latitude',


    ];

}
