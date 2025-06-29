<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $table = 'guru';
    protected $primaryKey = 'id_guru';
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'email',
        'nip',
        'username',
        'password',
        'foto'
    ];

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class, 'guru_mapel', 'id_guru', 'id_mapel');
    }

    public function permintaanJadwal()
    {
        return $this->hasMany(PermintaanJadwal::class, 'id_guru', 'id_guru');
    }
}
