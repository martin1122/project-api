<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use App\Transformers\DeviceTransformer;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $resource = fractal(Device::all(), new DeviceTransformer())
            ->withResourceName('device')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Device $device) 
    {
        $resource = fractal($device, new DeviceTransformer())
        ->withResourceName('device')
        ->toArray();

        return response()->json($resource);
    }
}
