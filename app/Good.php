<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Attribute;

class Good extends Model
{
    //
    protected $table = 'goods';
    protected $fillable = ['title','price','code','size','color'];


    public static function getGroupGoods($code){
        return Good::where('code','=', $code)->get();
    }


    public function attributes(){
       return $this->belongsToMany('App\Attribute','goods_attribute')->withPivot('sku');
    }
}