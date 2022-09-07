<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AnggotaModel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    protected $primarykey = 'nrp';

    protected $filliable = [
        'nrp',
        'nama_anggota',
        'alamat_anggota',
        'tgl_lahir',
        'tempat_lahir',
        'jenis_kelamin',
        'no_telepon',
        'email',
        'jabatan',
        'bagian',
        'level',
        'status',
        'password'
    ];

    protected $hidden = [
        'password',
        //'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

}
