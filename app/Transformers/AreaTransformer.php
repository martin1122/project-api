<?php 

namespace App\Transformers;

use League\Fractal;

class AreaTransformer extends Fractal\TransformerAbstract
{	

	public function transform($data)
	{	
	    return [
	    	'id'        => $data->id,
	        'name'      => $data->name,
	        'parent_id' => $data->parent_id,
	    ];
	}
}