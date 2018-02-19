<?php

namespace App\Http\Controllers\Device;

use App\Models\Device;
use App\Model\Stat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\StatTransformer;

/**
 * @resource Device/Stat
 *
 * This is the subresource of the stats aggregated for a single device and its devices
 */
class StatController extends Controller
{
    /**
     * Displays the stats belonging to an device
     *
     * Displays an aggregated set of stats turned into a single item for the device
     * 
     * @transformer \App\Transformers\StatTransformer
     * @transformermodel \App\Models\Stat
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Device $device The Device the stats belong to
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function index(Request $request, Device $device)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];

        $resource = fractal($device->stat($filter), new StatTransformer())
            ->withResourceName('stat')
            ->toArray();

        return response()->json($resource);
    }

}