<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwal';
    protected $primaryKey = 'id_jadwal';
    public $timestamps = false;

    protected $fillable = [
        'nama_jadwal',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'status',
        'gambar_jadwal',
        'id_lab',
        'id_guru',
        'id_operator',
        'id_mapel',
        'id_kelas'
    ];

    // Relasi ke Guru
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id_guru', 'id_guru');
    }

    // Relasi ke Labolatorium
    public function lab()
    {
        return $this->belongsTo(Labolatorium::class, 'id_lab', 'id_lab');
    }

    // Relasi ke Operator
    public function operator()
    {
        return $this->belongsTo(Operator::class, 'id_operator', 'id_operator');
    }

    // Relasi ke Mapel
    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel', 'id_mapel');
    }

    // Relasi ke Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas', 'id_kelas');
    }

    public function permintaan()
    {
        return $this->hasOne(PermintaanJadwal::class, 'id_jadwal')
            ->where('id_guru', session('guru_id'))
            ->latest('id_permintaan');
    }
}
