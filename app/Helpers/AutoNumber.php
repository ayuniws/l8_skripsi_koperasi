<?php

namespace App\Helpers;

use App\Models\JabatanModel;
use Carbon\Carbon;
use App\Models\RecycleModel;
use App\Models\SimpananModel;
// use Illuminate\support\Facades\DB;
use Illuminate\Support\Str;

class AutoNumber
{
    //public static $kd = '';
    public static function getYearMonthDay(){
        $now = Carbon::now();
        $ymd = $now->year . $now->month . $now->day;
        return $ymd;
    }

    public static function getJabatanAutoNo($prefix){
        $now = Carbon::now();
        $ymd = $now->year . $now->month . $now->day;
        $get_awal = JabatanModel::all()->last();
        if($get_awal === null){
            $no = 0;
            $kode = $prefix.'001';
        }else{
            $no = Str::substr($get_awal->id_recycle,2,3);
            $kode = $prefix.sprintf('%03s',(int)$no+1);
        }
        return $kode;
    }
    public static function getBagianAutoNo($prefix){
        $now = Carbon::now();
        $ymd = $now->year . $now->month . $now->day;
        $get_awal = JabatanModel::all()->last();
        if($get_awal === null){
            $no = 0;
            $kode = $prefix.'001';
        }else{
            $no = Str::substr($get_awal->id_recycle,2,3);
            $kode = $prefix.sprintf('%03s',(int)$no+1);
        }
        return $kode;
    }
    public static function getSimpananAutoNo(){
        $prefix = 'TRP-';
        $now = Carbon::now();
        $ymd = $now->year . $now->month . $now->day;
        $get_awal = SimpananModel::all()->last();
        if($get_awal === null){
            $no = 0;
            $kode = $prefix.$ymd.'001';
        }else{
            $no = Str::substr($get_awal->no,2,3);
            $kode = $prefix.$ymd.sprintf('%03s',(int)$no+1);
        }
        return $kode;
    }
    public static function getPinjamanAutoNo(){
        $prefix = 'TRS-';
        $now = Carbon::now();
        $ymd = $now->year . $now->month . $now->day;
        $get_awal = SimpananModel::all()->last();
        if($get_awal === null){
            $no = 0;
            $kode = $prefix.$ymd.'001';
        }else{
            $no = Str::substr($get_awal->no,2,3);
            $kode = $prefix.$ymd.sprintf('%03s',(int)$no+1);
        }
        return $kode;
    }
}
