<?php

namespace App\Http\Controllers\Device;

use App\Models\Error;
use App\Models\Device;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\ErrorTransformer;

class ErrorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Device $device)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($device->errors(null, $page, $filter), new ErrorTransformer())
            ->withResourceName('error')
            ->toArray();

        return response()->json($resource);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hourly(Request $request, Device $device)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($device->errors('h', $page, $filter), new ErrorTransformer())
            ->withResourceName('error')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daily(Request $request, Device $device)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($device->errors('d', $page, $filter), new ErrorTransformer())
            ->withResourceName('error')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function weekly(Request $request, Device $device)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($device->errors('w', $page, $filter), new ErrorTransformer())
            ->withResourceName('error')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function monthly(Request $request, Device $device)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($device->errors('m', $page, $filter), new ErrorTransformer())
            ->withResourceName('error')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function yearly(Request $request, Device $device)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($device->errors('y', $page, $filter), new ErrorTransformer())
            ->withResourceName('error')
            ->toArray();

        return response()->json($resource);
    }
}
