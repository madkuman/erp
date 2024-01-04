<?php

namespace App\Models;

use App\Models\Vendor;
use App\Models\PengadaanDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengadaan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'pengadaan';
    protected $guarded = ['id'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function pengadaan_detail()
    {
        return $this->hasMany(PengadaanDetail::class, 'pengadaan_id');
    }
}
