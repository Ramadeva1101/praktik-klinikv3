<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPemeriksaanKunjungan extends Model
{
    protected $table = 'detail_pemeriksaan_kunjungans';

    protected $fillable = [
        'kode_pelanggan',
        'nama_pasien',
        'kode_pemeriksaan',
        'nama_pemeriksaan',
        'harga',
        'total_harga',
        'tanggal_kunjungan',
    ];

    protected $casts = [
        'tanggal_kunjungan' => 'datetime',
        'harga' => 'decimal:2',
    ];

    public function kasir(): BelongsTo
    {
        return $this->belongsTo(Kasir::class, 'kode_pelanggan', 'kode_pelanggan')
            ->where('tanggal_kunjungan', $this->tanggal_kunjungan);
    }

    public function getStatusPembayaranAttribute()
    {
        return $this->kasir?->status_pembayaran ?? 'Belum Dibayar';
    }

    public function kunjungan(): BelongsTo
    {
        return $this->belongsTo(Kunjungan::class, 'kode_pelanggan', 'kode_pelanggan')
            ->where('tanggal_kunjungan', $this->tanggal_kunjungan);
    }

    public function pasien(): BelongsTo
    {
        return $this->belongsTo(Pasien::class, 'kode_pelanggan', 'kode_pelanggan');
    }

    public function riwayatPembayaran()
    {
        return $this->belongsTo(RiwayatPembayaran::class, 'kode_pelanggan', 'kode_pelanggan')
            ->where('tanggal_kunjungan', $this->tanggal_kunjungan);
    }
}
