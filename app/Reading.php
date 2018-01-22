<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use InfluxDb;
use League\Fractal;

class Reading extends Model
{
    public function retrieve()
    {
    	$client = new InfluxDb;
		$data = $client::query('SELECT * from "readings" ORDER BY time DESC');

		$resource = new Fractal\Resource\Collection($data, function($data) {

			$id = $data->time + '-1';

		    return [
		    	'id' => $id,
		        'title' => 'testing fractal',
		        'reading' => $data->reading,
		        'time'  => $data->time
		    ];
		});

		dd($resource);
	
    }
}
