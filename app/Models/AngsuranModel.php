<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AngsuranModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_tr_angsuran';
    protected $primary_key='id';
    public $timestamps = false;
    protected $fillable = [
        'no',
        'no_pinjaman',
        'nrp',
        'tanggal',
        'jumlah',
        'angsuran_ke',
        'keterangan',
        'admin'
    ];
}
