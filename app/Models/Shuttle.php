<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shuttle extends Model
{
    // Mendaftarkan kolom yang boleh diisi
    protected $fillable = [
        'nama_armada',
        'kapasitas',
        'rute_operasional',
        'status_aktif'
    ];

    // Opsional: JSON menampilkan true/false, bukan 1/0
    protected function casts(): array
    {
        return [
            'status_aktif' => 'boolean',
        ];
    }
}
