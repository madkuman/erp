<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembayaran extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'pembayaran';
    protected $guarded = ['id'];

    public function pengadaan_detail()
    {
        return $this->belongsTo(PengadaanDetail::class, 'pengadaan_detail_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
