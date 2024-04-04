<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;
    protected $guarded=['id'];
    public function stok(){
        return $this->belongsTo(stok::class);
    }
    public function user(){
        return $this->belongsTo(user::class);
    }
}
