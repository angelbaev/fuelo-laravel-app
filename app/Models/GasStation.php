<?php

namespace App\Models;

use App\Models\Contracts\ModelAwareInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class GasStation extends Model implements ModelAwareInterface
{
    use HasFactory, HasUuids;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'src_id',
        'brand_id',
        'brand_src_id',
        'name',
        'city',
        'address',
        'lat',
        'lon'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
