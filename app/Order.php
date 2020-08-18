<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name', 'description', 'file'
    ];
    /**
     * @var false|mixed|string
     */

    public function user(){
        return $this->belongsTo('App/User');
    }
}
