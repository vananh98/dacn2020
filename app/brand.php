<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    //
    protected $table='thuonghieu';
    protected $primaryKey = 'MaTH';
    public $timestamps= false;
    public function product(){
        return $this->hasMany('App\product','FK_MaTH','MaTH');
    }
    public function typeProduct(){
        return $this->hasManyThrough('App\typeProduct','App\product','FK_MaTH','MaLoai','MaTH','FK_MaLoai');
    }
}
