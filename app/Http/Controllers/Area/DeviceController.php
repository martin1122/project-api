<?php

namespace App\Http\Controllers\Area;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\DeviceTransformer;

/**
 * @resource Area/Device
 *
 * This is the subresource of all devices belonging to a supplied area.
 */
class DeviceController extends Controller
{

    /**
     * Displays a listing of all devices belonging to the supplied area paginated
     *
     * Displays a listing of transformed device objects belonging to the supplied area utilising fractal to provide include and pagination capabilities
     * 
     * @transformer \App\Transformers\DeviceTransformer
     * @transformermodel \App\Models\Device
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Area $area The area to get the devices from
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function index(Request $request, Area $area)
    {
        $resource = fractal($area->devices, new DeviceTransformer())
            ->withResourceName('device')
            ->toArray();

        return response()->json($resource);
    }
}