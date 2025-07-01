<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class PermintaanJadwal extends Model
    {
        protected $table = 'permintaan_jadwal';
        protected $primaryKey = 'id_permintaan';
        public $timestamps = false;

        protected $fillable = ['id_guru', 'id_jadwal', 'id_mapel', 'id_kelas', 'hari', 'jam_mulai', 'jam_selesai', 'status', 'catatan'];

        public function guru()
        {
            return $this->belongsTo(Guru::class, 'id_guru');
        }

        public function mapel()
        {
            return $this->belongsTo(Mapel::class, 'id_mapel');
        }

        public function kelas()
        {
            return $this->belongsTo(Kelas::class, 'id_kelas');
        }

        public function jadwal()
        {
            return $this->belongsTo(Jadwal::class, 'id_jadwal');
        }
    }
?>