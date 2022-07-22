<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiXeModel extends Model
{
    use HasFactory;
    public $timestamps=true;
    protected $table='loaixes';
    protected $primarykey='id';


}
