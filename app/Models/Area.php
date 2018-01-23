<?php

namespace App\Models;

use App\Models\Device;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

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

    // public function readings($period, $offset)
    // {
    //     return Reading::retrieve($period, $offset, $this->id);
    // }
}
