<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class Surat extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_surat',
        'judul_surat',
        'isi',
        'status',

    ];
    protected $table = 'surat';
    protected $primaryKey = 'id';
    
    public static function boot()
    {
        parent::boot();

        static::created(function ($surat) {
            if (auth()->check()) {
                Log::info('Surat ' . $surat->id . ' telah dibuat oleh ' . auth()->user()->name);
            } else {
                Log::info('Surat ' . $surat->id . ' telah dibuat');
            }
        });

        static::updated(function ($surat) {
            if (auth()->check()) {
                Log::info('Surat ' . $surat->id . ' telah diupdate oleh ' . auth()->user()->name);
            } else {
                Log::info('Surat ' . $surat->id . ' telah diupdate');
            }
        });

        static::deleted(function ($surat) {
            if (auth()->check()) {
                Log::info('Surat ' . $surat->id . ' telah dihapus oleh ' . auth()->user()->name);
            } else {
                Log::info('Surat ' . $surat->id . ' telah dihapus');
            }
        });
    }

}
