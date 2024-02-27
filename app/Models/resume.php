<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resume extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $table = 'resumes';

    protected $fillable = [

        'user_id',
        'nama',
        'sekolah',
        'judul',
        'keterangan',
        'path',
        'ukuran_file',

    ];
}
