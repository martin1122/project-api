<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use InfluxDb;
use League\Fractal;
use DateTime;

class Reading extends Model
{
    public function retrieve($period = null, $paginate = null)
    {
        $results = InfluxDb::getQueryBuilder()
            ->select('*')
            ->from('readings');
        
        if (!empty($period)) {
            $results = $results->where(["time >= now() - 1{$period}"]);
        }

        $results = $results->orderBy('time', 'DESC')
            ->getResultSet()
            ->getPoints();

    	return $results;
    }
}
