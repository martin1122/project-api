<?php

namespace App\Http\Controllers;

use App\Model\Stat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\StatTransformer;

/**
 * @resource Stat
 *
 * This returns an aggregated item of stats representing statistics of all the models
 */
class StatController extends Controller
{
    /**
     * Displays the platform stats 
     *
     * Displays an aggregated set of stats turned into a single item for the platform
     * 
     * @transformer \App\Transformers\StatTransformer
     * @transformermodel \App\Models\Stat
     * @param \Illuminate\Http\Request $request The Request Data
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function index(Request $request)
    {
        $resource = fractal(Stat::retrieve(), new StatTransformer())
            ->withResourceName('stat')
            ->toArray();

        return response()->json($resource);
    }

}