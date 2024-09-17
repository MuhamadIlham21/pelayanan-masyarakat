<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filebase extends Model
{
    use HasFactory;

    protected $table = "file_base";

    protected $fillable = [
        "id_filebase",
        "keterangan",
        "status"
    ];
}
