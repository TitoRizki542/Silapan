<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\Syarat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Administrasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'no_tiket',
        'jenis_pengajuan',
        'status',
        'tgl_verifikasi',
        'catatan',
        'alamat_tujuan',
    ];
    protected $dates = ['tgl_verifikasi'];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'jenis_pengajuan' => \App\Enums\JenisPengajuan::class,
            'status' => \App\Enums\StatusPengajuan::class,
        ];
    }

    /**
     * Get all of the syarats for the Pengajuan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function syarats()
    {
        return $this->hasMany(Syarat::class, 'administrasi_id');
    }

    public function getTglVerifikasiAttribute($value)
    {
        return Carbon::parse($value)->format('d F Y');
    }

    /**
     * Get the user that owns the Administrasi
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
