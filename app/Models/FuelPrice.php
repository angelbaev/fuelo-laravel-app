<?php

namespace App\Models;

use App\Models\Contracts\ModelAwareInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class FuelPrice extends Model implements ModelAwareInterface
{
    use HasFactory, HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fuel_id',
        'dimension_id',
        'price',
        'date'
    ];

    public function fuel()
    {
        return $this->belongsTo(Fuel::class);
    }

    public function dimension()
    {
        return $this->belongsTo(Dimension::class);
    }
}
