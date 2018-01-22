<?php 

namespace App\Transformers;

use League\Fractal;


class ReadingTransformer extends Fractal\TransformerAbstract
{	

	public function transform($data)
	{	

	    $id = $data['time'] . '-1';

	    return [
	    	'id' => $id,
	        'title' => 'testing fractal',
	        'reading' => $data['reading'],
	        'time'  => $data['time']
	    ];
	}
}