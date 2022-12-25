<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('nama', 'like', '%' . $search . '%');
        });

        $query->when($filters['poliklinik'] ?? false, function ($query, $poliklinik) {
            return $query->whereHas('poliklinik', function ($query) use ($poliklinik) {
                $query->where('slug', $poliklinik);
            });
        });
    }

    protected function poliklinik()
    {
        return $this->belongsTo(Poliklinik::class);
    }

    public function jadwal()
    {
        return $this->hasMany(JadwalDokter::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}