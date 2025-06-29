<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru_mapel';
    protected $primaryKey = 'id_guru';
    public $timestamps = false;

    protected $fillable = [
        'id_guru',
        'id_mapel'
    ];

    // Relasi: 1 guru punya banyak jadwal
    public function guru()
    {
        return $this->hasMany(Jadwal::class, 'id_guru', 'id_guru');
    }
    public function mapel()
    {
        return $this->belongsToMany(Mapel::class, 'guru_mapel', 'id_guru', 'id_mapel');
    }

    //hasManyThrough karena guru berelasi dengan laporan melalui pihak ketiga (jdawal)
    public function laporanPraktikum()
    {
        return $this->hasManyThrough(
            \App\Models\LaporanPraktikum::class,
            \App\Models\Jadwal::class,
            'id_guru',
            'id_jadwal',
            'id_guru',
            'id_jadwal'
        );
    }
}
