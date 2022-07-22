<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    use HasFactory;
    protected $table='comments';
    protected $primarykey='comment_id';
    public $timestamps=false;
    public function sanpham(){
        return $this->belongsTo('App\Models\SanPhamModel','comment_product_id');
    }
}
