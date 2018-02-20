<?php 

namespace App\Transformers;

use League\Fractal;
use App\Models\Stat;

class StatTransformer extends Fractal\TransformerAbstract
{

    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
    ];

    /**
     * Transform object into an json api array to display
     *
     * @param array $data The stat data to transformer
     * 
     * @return array
     */
    public function transform($data)
    {
        return [
            'id'                          => array_get($data, 'id', 'all'),
            'average_reading'             => array_get($data, 'average_reading'),
            'last_reading'                => array_get($data, 'last_reading'),
            'count_reading'               => array_get($data, 'count_reading'),
            'average_prev_difference_val' => array_get($data, 'average_prev_difference_val'),
            'last_prev_difference_val'    => array_get($data, 'last_prev_difference_val'),
            'average_prev_difference_pct' => array_get($data, 'average_prev_difference_pct'),
            'last_prev_difference_pct'    => array_get($data, 'last_prev_difference_pct'),
            'average_power'               => array_get($data, 'average_power'),
            'last_power'                  => array_get($data, 'last_power'),
        ];
    }
}