<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class absenMasuk extends Model
{
    use HasFactory;

    protected $table = 'absen_masuk';

    protected $fillable = [

        'user_id',
        'nim',
        'nama',
        'email',
        'sekolah',
        'status',
        'tanggal',
        'jam',
        'longitude',
        'latitude',
        'keterangan',


    ];

}
