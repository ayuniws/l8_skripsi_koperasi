<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AnggotaModel extends Model
{
    protected $table = 'tbl_m_anggota';
    protected $primarykey = 'nrp';
    public $timestamps = false;


    protected $fillable = [
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
    ];

    public function user()
    {
    	return $this->belongsTo(User::class,'nrp','nrp');
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


}
