<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    protected $table = 'dokumen';

    // WAJIB: Matikan fitur created_at dan updated_at karena tidak ada di tabel DB
    public $timestamps = false; 
    
    // KRITIS: Set Primary Key ke no_dokumen
    protected $primaryKey = 'no_dokumen';
    public $incrementing = false; // Karena PK bukan integer auto-increment
    protected $keyType = 'string'; // Karena PK adalah Varchar

    protected $fillable = [
        'no_dokumen',
        'nama_dok',
        'keterangan',
        'username',
        'jenis',
        'link',
        'status',
        'validasi',
        'tgl_proses'
    ];

    protected $dates = ['tgl_proses'];
}