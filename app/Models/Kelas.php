<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Kelas extends Model
    {
        protected $table = 'kelas';
        protected $primaryKey = 'id_kelas';
        public $timestamps = false;

        protected $fillable = ['id_guru', 'nama_kelas'];
    }
?>