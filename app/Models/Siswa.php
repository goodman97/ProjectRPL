<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa'; // tabel yg sudah ada
    protected $primaryKey = 'id_siswa'; // primary key tabel
    public $timestamps = false; // jika tabel kamu pakai created_at & updated_at

    protected $fillable = [
        'nama_siswa',
        'username',
        'password',
    ];
}
