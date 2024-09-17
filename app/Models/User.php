<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Str;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'no_identitas',
        'nama',
        'email',
        'password',
        'no_telp',
        'role',
        'status',
        'jenis_identitas',
        'foto',
        'dokumen_identitas'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'foto' => 'array',
        'dokumen_identitas' => 'array'
    ];

    public function canAccessPanel(Panel $panel): bool
    {
        // Mendapatkan URL rute saat ini
        $currentUrl = url()->previous();

        // Cek apakah pengguna adalah admin dan rute login adalah 'admin/login'
        if ($this->role === 'admin' && str_contains($currentUrl, 'admin')) {
            return true;
        }

        // Cek apakah pengguna adalah pegawai dan rute login adalah 'pegawai/login'
        if ($this->role === 'pegawai' && str_contains($currentUrl, 'pegawai')) {
            return true;
        }

        // Jika tidak sesuai dengan peran dan rute, akses ditolak
        return false;
    }

}
