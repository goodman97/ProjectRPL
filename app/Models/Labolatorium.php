<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Labolatorium extends Model
{
    protected $table = 'labolatorium';
    protected $primaryKey = 'id_lab';
    public $timestamps = false;

    protected $fillable = ['nama_lab', 'status', 'gambar'];
}