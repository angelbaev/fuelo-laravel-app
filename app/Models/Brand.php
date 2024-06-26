<?php

namespace App\Models;

use App\Models\Contracts\ModelAwareInterface;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Brand extends Model implements ModelAwareInterface
{
    use HasFactory, HasUuids;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'src_id',
        'logo',
        'name',
    ];

    public function gasStations()
    {
        return $this->hasMany(GasStation::class);
    }
}
