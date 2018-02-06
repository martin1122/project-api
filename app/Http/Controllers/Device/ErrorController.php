<?php

namespace App\Http\Controllers\Device;

use App\Models\Error;
use App\Models\Device;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\ErrorTransformer;

/**
 * @resource Device/Error
 *
 * This is the subresource of all errors belonging to a supplied device
 */
class ErrorController extends Controller
{
    /**
     * Displays a listing of all device errors paginated in divisons of 500
     *
     * Displays a listing of transformed error points, belonging to the requested device, utilising fractal to provide include capabilities
     * 
     * @transformer \App\Transformers\ErrorTransformer
     * @transformermodel \App\Models\Error
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Device $device The Device the errors belong to
     * @return \Illuminate\Http\Response The transformed json response
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
     * Displays a listing of all device errors grouped into hourly points paginated in divisons of 500
     *
     * Displays a listing of transformed error points, belonging to the requested device, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.
     * 
     * @transformer \App\Transformers\ErrorTransformer
     * @transformermodel \App\Models\Error
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Device $device The Device the errors belong to
     * @return \Illuminate\Http\Response The transformed json response
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
     * Displays a listing of all device errors grouped into daily points paginated in divisons of 500
     *
     * Displays a listing of transformed error points, belonging to the requested device, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.
     * 
     * @transformer \App\Transformers\ErrorTransformer
     * @transformermodel \App\Models\Error
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Device $device The Device the errors belong to
     * @return \Illuminate\Http\Response The transformed json response
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
     * Displays a listing of all device errors grouped into weekly points paginated in divisons of 500
     *
     * Displays a listing of transformed error points, belonging to the requested device, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.
     * 
     * @transformer \App\Transformers\ErrorTransformer
     * @transformermodel \App\Models\Error
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Device $device The Device the errors belong to
     * @return \Illuminate\Http\Response The transformed json response
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
     * Displays a listing of all device errors grouped into monthly points paginated in divisons of 500
     *
     * Displays a listing of transformed error points, belonging to the requested device, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.
     * 
     * @transformer \App\Transformers\ErrorTransformer
     * @transformermodel \App\Models\Error
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Device $device The Device the errors belong to
     * @return \Illuminate\Http\Response The transformed json response
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
     * Displays a listing of all device errors grouped into yearly points paginated in divisons of 500
     *
     * Displays a listing of transformed error points, belonging to the requested device, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.
     * 
     * @transformer \App\Transformers\ErrorTransformer
     * @transformermodel \App\Models\Error
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Device $device The Device the errors belong to
     * @return \Illuminate\Http\Response The transformed json response
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
