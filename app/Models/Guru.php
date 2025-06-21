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
        'mapel',
        'nip',
        'username',
        'password',
        'foto'
    ];

    // Relasi: 1 guru punya banyak jadwal
    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'id_guru', 'id_guru');
    }
}
