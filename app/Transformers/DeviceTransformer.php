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
		'readings',
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
	    	'id'         => $device->id,
			'area_id'    => $device->area_id,
	        'name'       => $device->name,
	        'latitude'   => $device->latitude,
			'longitude'  => $device->longitude,
			'created_at' => $device->created_at,
			'updated_at' => $device->updated_at,
			'deleted_at' => $device->deleted_at
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
		if($device->parent) {
			return $this->item($device->parent, new AreaTransformer, 'area');
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
     * Include errors
     *
     * @return League\Fractal\CollectionResource
     */
    public function includeErrors(Device $device)
    {
        return $this->collection($device->errors(), new ErrorTransformer, 'error');
    }
}