<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiswaModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_m_siswa';
    protected $primarykey = 'id';

    protected $filliable = [
        'NIS',
        'NamaSiswa',
        'Alamat'
    ]; 
}
