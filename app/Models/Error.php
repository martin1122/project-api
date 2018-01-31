<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use InfluxDb;
use League\Fractal;
use DateTime;

class Error extends Model
{
    public $incrementing = false;

    public static function retrieve($period = null, $offset = 0, $deviceId = null)
    {
        switch ($period) {
            case 'm':
                $period = 'w';
                $number = 4;
                break;
            case 'y':
                $period = 'd';
                $number = 365;
                break;
            default:
                $number = 1;
                break;
        }

        $results = InfluxDb::getQueryBuilder()
            ->select('*')
            ->from('errors');
        
        if (!empty($period)) {
            $startNum = $number * $offset;
            $endNum = $number * ($offset+1);
            if ($offset > 0) {
                $results = $results->where(["time <= now() - {$startNum}{$period}"]);
            }
            $results = $results->where(["time >= now() - {$endNum}{$period}"]);
        }

        if (!empty($deviceId)) {
            if(is_array($deviceId)) {
                $query = "(";

                for ($i = 0; $i < count($deviceId); $i++) {
                    $query .= "device = '{$deviceId}'";
                    if($i > 0 && $i < (count($deviceId)-1)) {
                        $query .= " OR ";
                    }
                }
                $query .= ")";

                $results = $results->where([$query]);
            } else {
                $results = $results->where(["device = '{$deviceId}'"]);
            }
        }

        $results = $results->orderBy('time', 'DESC')
            ->getResultSet()
            ->getPoints();

    	return $results;
    }
}
