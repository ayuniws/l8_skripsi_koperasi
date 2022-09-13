<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AngsuranModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_tr_angsuran';
    protected $primary_key='id';
    // public $timestamps = false;
    protected $fillable = [
        'no',
        'nrp',
        'tanggal',
        'jumlah',
        'angsuran_ke',
        'keterangan',
        'admin'
    ];

    public function anggota(){
        return $this->belongsTo(AnggotaModel::class,'nrp','nrp');
    }
    public function user(){
        return $this->belongsTo(User::class,'nrp','nrp');
    }
}
