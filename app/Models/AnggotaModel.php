<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AnggotaModel extends Model
{
    protected $table = 'users';
    protected $primarykey = 'nrp';
    public $timestamps = false;


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
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

}
