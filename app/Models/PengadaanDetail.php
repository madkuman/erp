<?php

namespace App\Models;

use App\Models\Pengadaan;
use App\Models\UsulanDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PengadaanDetail extends Model
{
    use HasFactory;

    protected $table = "pengadaan_detail";
    protected $guarded = ['id'];

    public function pengadaan()
    {
        return $this->belongsTo(Pengadaan::class, 'pengadaan_id');
    }

    public function usulan_detail()
    {
        return $this->belongsTo(UsulanDetail::class, 'usulan_detail_id');
    }
}
