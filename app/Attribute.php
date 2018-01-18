<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Good;

class Attribute extends Model
{
    //
    protected $table = 'attributes';
    protected $fillable = ['title'];

    public function goods(){
        return  $this->belongsToMany('App\Goods','goods_attribute' )->withPivot('sku');
    }

}
