<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use InfluxDb;
use League\Fractal;

class Reading extends Model
{
    public function retrieve()
    {
    	$client = new InfluxDb;

		$data = $client::query('SELECT * from "readings" ORDER BY time DESC');

		return $data->getPoints();
	
    }
}
