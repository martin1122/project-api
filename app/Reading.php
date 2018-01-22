<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use InfluxDb;

class Reading extends Model
{
    public function retrieve()
    {
    	$client = new InfluxDb;
		$data = $client::query('SELECT * from "readings" ORDER BY time DESC');

		dd($data);
    }
}
