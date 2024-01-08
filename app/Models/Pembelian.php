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
    protected $table = 'penawaran';
    protected $guarded = ['id'];

    public function pengadaan_detail()
    {
        return $this->belongsTo(PengadaanDetail::class, 'pengadaan_detail_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by', 'updated_by', 'deleted_by');
    }
}
