<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    protected $table = 'operator'; // tabel yg sudah ada
    protected $primaryKey = 'id_operator'; // primary key tabel
    public $timestamps = false; // jika tabel kamu pakai created_at & updated_at

    protected $fillable = [
        'nama_operator',
        'username',
        'password',
    ];
}
