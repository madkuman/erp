<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisUsulan extends Model
{
    use HasFactory;
    protected $table = 'jenis_usulan';

    public function usulan()
    {
        return $this->hasMany(Usulan::class, 'deskripsi');
    }
}
