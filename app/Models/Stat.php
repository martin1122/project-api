<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use InfluxDb;
use League\Fractal;
use DateTime;

class Stat extends Model
{
    public $incrementing = false;

    public static function retrieve($deviceId = null)
    {
        $results = [];//InfluxDB::query($results);

    	return $results;
    }
}
