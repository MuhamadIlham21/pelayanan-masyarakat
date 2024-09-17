<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelayanan extends Model
{
    use HasFactory;

    protected $table = 'pelayanan';

    protected $fillable = [
        'id_pelayanan',
        'id_layanan',
        'no',
        'id_penginput',
        'id_user',
        'file_terlampir',
        'is_tagihan',
        'is_pdf',
        'is_attachment',
        'keterangan',
        'status',
    ];

    protected $casts = [
        'file_terlampir' => 'array'
    ];

}
