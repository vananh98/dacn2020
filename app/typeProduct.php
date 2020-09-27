<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class typeProduct extends Model
{
    //
    protected $table='DanhMuc';
    public $timestamps= false;
    protected $primaryKey = 'MaLoai';
    public function product(){
        return $this->hasMany('App\product','FK_MaLoai','MaLoai');
    }
    public function brand(){
        return $this->hasManyThrough('App\brand','App\product','FK_MaLoai', 'MaTH' , 'MaLoai','FK_MaTH');
    }
}

