<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BagianModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_m_bagian';
    protected $primary_key = 'id';
    public $timestamps = 'false';

    protected $fillable = [
        'kode',
        'nama_bagian',
    ];


}
