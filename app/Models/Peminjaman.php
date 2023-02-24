<?php

namespace App\Models;
use carbon\carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';
    protected $fillable = ['kode_pinjam','peminjam_id','petugas_id','status','denda','tanggal_pinjam','tanggal_kembali'];

    //relasi
    public function detail_peminjaman()
    {
        return $this->hasMany(DetailPeminjaman::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //accesssor
    protected function firstName(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
        );
    }

    public function getDendaAttribute($value)
    {
        return ($value) ? "Rp. {{$value}}" : '-' ;
    }
    public function getTanggalPinjamAttribute($value)
    {
        return Carbon::create($value)->format('d-m-Y') ;
    }
    public function getTanggalKembaliAttribute($value)
    {
        return Carbon::create($value)->format('d-m-Y') ;
    }
}
