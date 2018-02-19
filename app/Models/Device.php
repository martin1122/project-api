<?php

namespace App\Models;

use App\Models\Reading;
use App\Models\Error;
use App\Models\Stat;
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
        'name', 'latitude', 'longitude', 'area_id'
    ];

    public $incrementing = false;

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function stat($filters = [])
    {   
        return [array_merge(
            Stat::retrieve($filters, $this->id)[0], [
                'id' => $this->id
            ]
        )];
    }

    public function readings($period = null, $paginate = 0, $filters = [])
    {
        return Reading::retrieve($period, $paginate, $filters, $this->id);
    }

    public function errors($period = null, $paginate= 0, $filters = [])
    {
        return Error::retrieve($period, $paginate, $filters, $this->id);
    }
}
