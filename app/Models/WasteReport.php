<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WasteReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'reporter_name',
        'latitude',
        'longitude',
        'description',
        'images',
        'status'
    ];

    protected $casts = [
        'images' => 'array',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->latitude)) {
                $model->latitude = 25.9155;
            }
            if (empty($model->longitude)) {
                $model->longitude = 13.9180;
            }
        });
    }
}
