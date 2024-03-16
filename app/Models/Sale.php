<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    protected $fillable =['nama_buah_terjual', 'stock_terjual', 'total_harga_terjual', 'tanggal_terjual'];
}
