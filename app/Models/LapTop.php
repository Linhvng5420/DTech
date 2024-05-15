<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LapTop extends Model
{
    use HasFactory;
    protected $table = 'laptop';
    protected $fillable = [
        'TenSP',
        'HinhAnh',
        'MauSac',
        'Gia',
        'Ram',
        'Rom',
        'MieuTa',
        'Hang'
    ];
    protected $attributes = [
        'MieuTa' => 'ahihi', // Giá trị mặc định
    ];
}
