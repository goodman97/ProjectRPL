<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'id_jadwal';
    public $timestamps = false;

    protected $fillable = ['nama_jadwal', 'hari', 'jam_mulai', 'jam_selesai', 'status', 'gambar_jadwal'];
}