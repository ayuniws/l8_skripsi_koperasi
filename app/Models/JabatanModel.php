<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_m_jabatan';
    protected $primary_key = 'id';
    public $timestamps = false;
    protected $fillable = [
        'kode_jabatan',
        'nama_jabatan',
    ];

    public function anggota(){
        return $this->belongsTo(AnggotaModel::class,'kode_jabatan');

    }


}
