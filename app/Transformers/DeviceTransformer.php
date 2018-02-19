<?php 

namespace App\Transformers;

use League\Fractal;
use App\Models\Device;

class DeviceTransformer extends Fractal\TransformerAbstract
{	

	/**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'parent',
        'stat',
        'readings',
        'stillHeres',
		'errors'
    ];

	/**
     * Transform object into an json api array to display
     *
	 * @param \App\Models\Device $device
     * @return array
     */
	public function transform(Device $device)
	{
       
	    return [
	    	'id'                => $device->id,
			'area_id'           => $device->area_id,
	        'name'              => $device->name,
	        'latitude'          => $device->latitude,
			'longitude'         => $device->longitude,
	        'depth_limit'       => $device->depth_limit,
			'storage_size'      => $device->storage_size,
	        'delay_period'      => $device->delay_period,
			'ar_mode_threshold' => $device->ar_mode_threshold,
	        'ar_mode_period'    => $device->ar_mode_period,
			'installed_at'      => $device->installed_at,
			'created_at'        => $device->created_at,
			'updated_at'        => $device->updated_at,
			'deleted_at'        => $device->deleted_at
	    ];
	}
	
	/**
     * Include Parent
     *
	 * @param \App\Models\Device $device
     * @return League\Fractal\ItemResource
     */
    public function includeParent(Device $device)
    {
		if ($device->parent) {
			return $this->item($device->parent, new AreaTransformer, 'area');
		}
		return $this->null();
    }
    
    /**
     * Include Stat
     *
	 * @param \App\Models\Device $device
     * @return League\Fractal\ItemResource
     */
    public function includeStat(Device $device)
    {
		if ($device->stat) {
			return $this->item($device->stat, new StatTransformer, 'stat');
		}
		return $this->null();
	}

	/**
     * Include readings
     *
     * @return League\Fractal\CollectionResource
     */
    public function includeReadings(Device $device)
    {
        return $this->collection($device->readings(), new ReadingTransformer, 'reading');
    }
    
    /**
     * Include still heres
     *
     * @return League\Fractal\CollectionResource
     */
    public function includeStillHeres(Device $device)
    {
        return $this->collection($device->stillHeres(), new StillHereTransformer, 'still_here');
	}
	
	/**
     * Include errors
     *
     * @return League\Fractal\CollectionResource
     */
    public function includeErrors(Device $device)
    {
        return $this->collection($device->errors(), new ErrorTransformer, 'error');
    }
}