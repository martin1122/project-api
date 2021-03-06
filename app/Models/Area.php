<?php

namespace App\Models;

use App\Models\Device;
use App\Models\Reading;
use App\Models\StillHere;
use App\Models\Error;
use App\Models\Stat;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'parent_id'
    ];

    public $incrementing = false;

    public function parent()
    {
        return $this->belongsTo(Area::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Area::class, 'parent_id');
    }

    public function devices()
    {
        return $this->hasMany(Device::class);
    }

    public function stat($filters = [])
    {
        return array_merge(
            Stat::retrieve($filters, $this->devices()->pluck('id')->toArray()), [
                'id' => $this->id
            ]
        );
    }

    public function readings($period = null, $paginate = 0, $filters = [])
    {
        return Reading::retrieve($period, $paginate, $filters, $this->devices()->pluck('id')->toArray());
    }

    public function stillHeres($period = null, $paginate = 0, $filters = [])
    {
        return StillHere::retrieve($period, $paginate, $filters, $this->devices()->pluck('id')->toArray());
    }

    public function errors($period = null, $paginate = 0, $filters = [])
    {
        return Error::retrieve($period, $paginate, $filters, $this->devices()->pluck('id')->toArray());
    }
}
