<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use App\Transformers\DeviceTransformer;

/**
 * @resource Device
 *
 * Each Device represents a different flood sensor in the network
 */
class DeviceController extends Controller
{
    /**
     * Displays a listing of all devices paginated
     *
     * Displays a listing of transformed device objects utilising fractal to provide include and pagination capabilities
     * 
     * @transformer \App\Transformers\DeviceTransformer
     * @transformermodel \App\Models\Device
     * @param \Illuminate\Http\Request $request The Request Data
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function index(Request $request)
    {
        $resource = fractal(Device::paginate(), new DeviceTransformer())
            ->withResourceName('device')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Displays a single device's data request via its id
     *
     * Returns a transformed item of the device model utilising fractal to provide include capatabilities
     * 
     * @transformer \App\Transformers\DeviceTransformer
     * @transformermodel \App\Models\Device
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Device $device The device item wanted
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function show(Request $request, Device $device) 
    {
        $resource = fractal($device, new DeviceTransformer())
        ->withResourceName('device')
        ->toArray();

        return response()->json($resource);
    }
}
