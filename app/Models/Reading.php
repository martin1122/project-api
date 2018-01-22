<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use InfluxDb;
use League\Fractal;
use DateTime;

class Reading extends Model
{
    public function retrieve()
    {
    	$client = new InfluxDb;

		$data = $client::query('SELECT * from "readings" ORDER BY time DESC');

		return $data->getPoints();
	
    }

    public function retrieveOneMonth()
    {	

    	$client = new InfluxDb;

		$data = $client::query('SELECT * FROM "readings" WHERE time >= now() - 4w ORDER BY time DESC');

		return $data->getPoints();
	
    }
}
