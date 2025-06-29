<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanPraktikum extends Model
{
    protected $table = 'laporan_praktikum';
    protected $primaryKey = 'id_laporan';
    public $timestamps = false;

    protected $fillable = [
        'hasil_praktikum', 'catatan', 'id_jadwal', 'id_siswa', 'tanggal'
    ];

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa');
    }
}
?>