<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'users';
    protected $primarykey = 'nrp';

    protected $fillable = [
        'nrp',
        'name',
        'email',
        'level',
        'status',
        'password',
    ];

    // public function anggota(){
    //     return $this->hasOne(AnggotaModel::class, 'nrp','nrp');
    // }

    public function anggota(){
        return $this->hasOne(AnggotaModel::class, 'nrp','nrp');
    }

    public function angsuran(){
        return $this->hasMany(AngsuranModel::class,'nrp','nrp');

    }

    public function pinjaman(){
        return $this->hasMany(PinjamanModel::class,'nrp','nrp');

    }
    public function simpanan(){
        return $this->hasMany(SimpananModel::class,'nrp','nrp');

    }


    // protected $hidden = [
    //     'password',
    //     //'remember_token',
    // ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
