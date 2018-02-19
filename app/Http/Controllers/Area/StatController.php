<?php

namespace App\Http\Controllers\Area;

use App\Models\Area;
use App\Model\Stat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\StatTransformer;

/**
 * @resource Area/Stat
 *
 * This is the subresource of the stats aggregated for a single area and its devices
 */
class StatController extends Controller
{
    /**
     * Displays the stats belonging to an area
     *
     * Displays an aggregated set of stats turned into a single item for the area
     * 
     * @transformer \App\Transformers\StatTransformer
     * @transformermodel \App\Models\Stat
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Area $area The Area the stats belong to
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function index(Request $request, Area $area)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];

        $resource = fractal($area->stat($filter), new StatTransformer())
            ->withResourceName('stat')
            ->toArray();

        return response()->json($resource);
    }

}