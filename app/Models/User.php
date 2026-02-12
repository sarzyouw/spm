<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $table = 'pegawai';
    protected $primaryKey = 'username';
    public $incrementing = false; 
    protected $keyType = 'string'; 

    // WAJIB FALSE: Karena nama kolom di DB bukan standar updated_at
    public $timestamps = false; 
    
    protected $fillable = [
        'username', 'nama_pegawai', 'password', 'level',
        'created_at', 
        'update_at', // FIX: Nama kolom database tanpa 'd'
    ];

    protected $casts = [
        'level' => 'integer',
        'created_at' => 'datetime', 
        'update_at' => 'datetime', 
    ];
}