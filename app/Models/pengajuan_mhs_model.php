<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\dosen;
use App\Models\mahasiswa;

class pengajuan_mhs_model extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'pengajuan_mhs';
    // public $with = ['dosen'];

    public function dosen()
    {
        return $this->belongsTo(dosen::class, 'id_dosen');
    }

    public function mhs()
    {
        return $this->belongsTo(mahasiswa::class, 'id_mhs');
    }
}
