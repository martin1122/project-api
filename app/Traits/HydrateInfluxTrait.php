<?php

namespace App\Traits;

trait HydrateInfluxTrait 
{
    public static function hydrateResultSet($resultSet) 
    {
        $results = [];
        $series = $resultSet->getSeries();
        foreach ($series as $serie) {
            foreach ($serie['values'] as $point) {
                $results[] = array_merge(array_combine($serie['columns'], $point), $serie['tags']);
            } 
        }
        return $results;
    }
}

