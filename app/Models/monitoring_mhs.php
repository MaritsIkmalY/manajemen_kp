<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\dosen;
use App\Models\mahasiswa;

class monitoring_mhs extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'monitoring_mhs';

    public function dosen()
    {
        return $this->belongsTo(dosen::class, 'id_dosen');
    }

    public function mhs()
    {
        return $this->belongsTo(mahasiswa::class, 'id_mhs');
    }
}
