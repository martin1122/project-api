<?php

namespace App\Http\Controllers\Area;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\DeviceTransformer;

class DeviceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Area $area)
    {
        $resource = fractal($area->devices, new DeviceTransformer())
            ->withResourceName('device')
            ->toArray();

        return response()->json($resource);
    }
}