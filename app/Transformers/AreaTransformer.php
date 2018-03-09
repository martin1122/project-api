<?php 

namespace App\Transformers;

use League\Fractal;
use App\Models\Area;

class AreaTransformer extends Fractal\TransformerAbstract
{	

	/**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
		'parent',
		'children',
        'devices',
        'stat',
        'readings',
        'stillHeres',
		'errors',
    ];

	/**
     * Transform object into an json api array to display
     *
     * @return array
     */
	public function transform(Area $area)
	{	
	    return [
	    	'id'         => $area->id,
	        'name'       => $area->name,
			'parent_id'  => $area->parent_id,
			'created_at' => $area->created_at,
			'updated_at' => $area->updated_at,
			'deleted_at' => $area->deleted_at
	    ];
	}

	/**
     * Include Parent
     *
     * @return League\Fractal\ItemResource
     */
    public function includeParent(Area $area)
    {
		if($area->parent) {
			return $this->item($area->parent, new AreaTransformer, 'area');
		}
		return $this->null();
	}
	
	/**
     * Include children
     *
     * @return League\Fractal\CollectionResource
     */
    public function includeChildren(Area $area)
    {
        return $this->collection($area->children, new AreaTransformer, 'area');
	}
	
	/**
     * Include devices
     *
     * @return League\Fractal\CollectionResource
     */
    public function includeDevices(Area $area)
    {
        return $this->collection($area->devices, new DeviceTransformer, 'device');
    }
    
    /**
     * Include stat
     *
     * @return League\Fractal\ItemResource
     */
    public function includeStat(Area $area)
    {
        if (!empty($area->stat)) {
            return $this->item($area->stat, new StatTransformer, 'stat');
        }
        return $this->null();
	}
	
	/**
     * Include readings
     *
     * @return League\Fractal\CollectionResource
     */
    public function includeReadings(Area $area)
    {
        return $this->collection($area->readings(), new ReadingTransformer, 'reading');
    }
    
    /**
     * Include readings
     *
     * @return League\Fractal\CollectionResource
     */
    public function includeStillHeres(Area $area)
    {
        return $this->collection($area->stillHeres(), new StillHereTransformer, 'still_here');
	}
	
	/**
     * Include errors
     *
     * @return League\Fractal\CollectionResource
     */
    public function includeErrors(Area $area)
    {
        return $this->collection($area->errors(), new ErrorTransformer, 'error');
    }
}