<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class mahasiswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function mhs()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
