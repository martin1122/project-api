<?php

namespace App\Models;

use App\Models\Reading;
use App\Models\Area;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'area_id', 'lat', 'long'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function readings($period, $offset)
    {
        return Reading::retrieve($period, $offset, $this->id);
    }
}
