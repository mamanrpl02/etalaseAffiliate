<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectionSosmed extends Model
{
    protected static function booted()
    {
        static::saving(function ($model) {
            if ($model->is_active) {
                // Set semua record lain menjadi tidak aktif
                self::where('id', '!=', $model->id)->update(['is_active' => false]);
            }
        });
    }
}
