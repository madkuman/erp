<?php

namespace App\Models;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KodeRekening extends Model
{
    protected $table = 'kode_rekening';
    protected $primaryKey = "id";
    protected $fillable = ['kode', 'nama_rekening', 'parent'];

    public function barang()
    {
        return $this->hasMany(Barang::class, 'kode_rekening_id');
    }
}
