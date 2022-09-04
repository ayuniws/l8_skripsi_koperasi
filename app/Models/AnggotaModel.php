<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_m_anggota';
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
    ]; 
}
