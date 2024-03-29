<?php

namespace App\Models;

use App\Models\PengadaanDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembelian extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'pembelian';
    protected $guarded = ['id'];

    public function pengadaan_detail()
    {
        return $this->belongsTo(PengadaanDetail::class, 'pengadaan_detail_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function penerimaan()
    {
        return $this->hasOne(Penerimaan::class, 'pembelian_id', 'id');
    }

    public function uji_fungsi()
    {
        return $this->hasOne(UjiFungsi::class, 'pembelian_id', 'id');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'pembelian_id', 'id');
    }

    public function usulan_detail()
    {
        return $this->belongsTo(UsulanDetail::class, 'usulan_detail_id');
    }
}
