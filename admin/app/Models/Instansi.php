<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;

    protected $table = 'instansi';

    protected $fillable = [
        'nama',
        'instansi_asal',
        'keperluan',
        'kontak',
        'guru_dituju',
        'jumlah_peserta',
        'waktu_kunjungan',
        'tanggal_kunjungan',
        'foto',
    ];

    protected $casts = [
        'tanggal_kunjungan' => 'date',
        'waktu_kunjungan' => 'datetime',
        'jumlah_peserta' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
} 