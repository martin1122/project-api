<?php 

namespace App\Transformers;

use League\Fractal;

class DeviceTransformer extends Fractal\TransformerAbstract
{	

	public function transform($data)
	{
	    return [
	    	'id'      => $data->id,
	        'name'    => $data->name,
	        'reading' => $data->reading,
	        'time'    => $data->time
	    ];
	}
}