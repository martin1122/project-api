<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use InfluxDb;
use League\Fractal;
use DateTime;
use App\Traits\HydrateInfluxTrait;

class Stat extends Model
{
    use HydrateInfluxTrait;
    public $incrementing = false;

    public static function retrieve($filters = [], $deviceId = null)
    {
        $results = InfluxDb::getQueryBuilder()
        ->select('mean(reading) as average_reading, last(reading) as last_reading, mean(power) as average_power, last(power) as last_power')
        ->from('readings');

        if (!empty($filters)) {
            $results = $results->where($filters);
        }

        if (!empty($deviceId)) {
            if (is_array($deviceId)) { 
                $query = "";

                for ($i = 0; $i < count($deviceId); $i++) {
                    $query .= "device = '{$deviceId[$i]}'";
                    if ($i < (count($deviceId)-1)) {
                        $query .= " OR ";
                    }
                }

                $results = $results->where([$query]);
            } else {
                $results = $results->where(["device = '{$deviceId}'"]);
            }
        }
        
        $results = $results->getQuery();

        $results = InfluxDB::query($results)
                        ->getPoints();

        return $results;
    }
}
