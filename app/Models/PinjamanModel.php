<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamanModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_te_pinjaman';
    protected $primary_key ='id';
    public $timestamps = false;

    protected $fillable = [
        'no',
        'tgl',
        'nrp',
        'jumlah_pinjaman',
        'angsuran',
        'keterangan',
    ];
}
