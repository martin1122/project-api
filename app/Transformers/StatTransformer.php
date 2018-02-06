<?php 

namespace App\Transformers;

use League\Fractal;
use App\Models\Stat;

class StatTransformer extends Fractal\TransformerAbstract
{	

	/**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
	];
	
	/**
     * Transform object into an json api array to display
     *
     * @return array
     */
	public function transform($data)
	{	
	    return [
	    	'id'           => null,
	    ];
	}
}