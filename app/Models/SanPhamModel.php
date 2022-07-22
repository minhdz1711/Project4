<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPhamModel extends Model
{
    use HasFactory;
    public $timestamps=true;
    protected $table='sanphams';
    protected $primarykey='product_id';
    public function comment(){
        return $this->hasMany('App\Models\CommentModel');
    }

    // const STATUS_PUBLIC=1;
    // const STATUS_PRIVATE=0;
    // protected $status=[
    //      1=>[
    //          'tt'=>'Public',
    //          'class'=>''

    //      ],
    //      0=>[
    //          'tt'=>'Private',
    //          'class'=>''
    //      ]
    // ];
    // public function gettrangthai(){
    //     return array_get($this->status,$this->trangthai,'[N\A]');
    // }
}
