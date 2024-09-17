<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $table = "layanan";

    protected $fillable = [
        'kode_layanan',
        'nama_layanan',
        'keterangan',
        'is_tagihan',
        'is_pdf',
        'is_attachment',
        'file_persyaratan',
        'header',
        'body',
        'footer',
        'status'
    ];

    protected $casts = [
        'file_persyaratan' => 'array',
        'body' => 'array'
    ];
}
