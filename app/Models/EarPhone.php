<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EarPhone extends Model
{
    protected $table = 'earphone';

    protected $fillable = ['TenSP', 'HinhAnh', 'MauSac', 'Gia', 'MieuTa', 'Hang'];
}
