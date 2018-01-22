<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use InfluxDb;
use League\Fractal;
use DateTime;

class Reading extends Model
{
    public function retrieve($period = null, $paginate = 0)
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
            ->from('readings');
        
        if (!empty($period)) {
            $startNum = $number * $paginate;
            $endNum = $number * ($paginate+1);
            if ($paginate > 0) {
                $results = $results->where(["time <= now() - {$startNum}{$period}"]);
            }
            $results = $results->where(["time >= now() - {$endNum}{$period}"]);
        }

        $results = $results->orderBy('time', 'DESC')
            ->getResultSet()
            ->getPoints();

    	return $results;
    }
}
