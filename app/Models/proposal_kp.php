<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\dosen;
use App\Models\mahasiswa;

class proposal_kp extends Model
{
    protected $guarded = ['id'];
    protected $table = 'proposal_kps';
    use HasFactory;

    public function dsn()
    {
        return $this->belongsTo(dosen::class, 'id_dosen');
    }

    public function mhs()
    {
        return $this->belongsTo(mahasiswa::class, 'id_mhs');
    }
}
