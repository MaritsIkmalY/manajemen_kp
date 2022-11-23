<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class dosen extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function dsn()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
