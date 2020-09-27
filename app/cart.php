<?php

namespace App;

use App\product;
use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    //
    protected $table = 'giohang';
    protected $primaryKey = 'STT';
    public function product()
    {
        return $this->hasOne('App\product', 'FK_MaSP', 'STT');
    }
}
