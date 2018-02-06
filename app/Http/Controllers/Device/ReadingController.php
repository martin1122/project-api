<?php

namespace App\Http\Controllers\Device;

use App\Models\Device;
use App\Models\Reading;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\ReadingTransformer;

/**
 * @resource Device/Reading
 *
 * This is the subresource of all readings belonging to a supplied device
 */
class ReadingController extends Controller
{
    /**
     * Displays a listing of all device readings paginated in divisons of 500
     *
     * Displays a listing of transformed reading points, belonging to the requested device, utilising fractal to provide include capabilities
     * 
     * @transformer \App\Transformers\ReadingTransformer
     * @transformermodel \App\Models\Reading
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Device $device The Device the readings belong to
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function index(Request $request, Device $device)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($device->readings(null, $page, $filter), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }
    
    /**
     * Displays a listing of all device readings grouped into hourly points paginated in divisons of 500
     *
     * Displays a listing of transformed reading points, belonging to the requested device, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.
     * 
     * @transformer \App\Transformers\ReadingTransformer
     * @transformermodel \App\Models\Reading
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Device $device The Device the readings belong to
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function hourly(Request $request, Device $device)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($device->readings('h', $page, $filter), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Displays a listing of all device readings grouped into daily points paginated in divisons of 500
     *
     * Displays a listing of transformed reading points, belonging to the requested device, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.
     * 
     * @transformer \App\Transformers\ReadingTransformer
     * @transformermodel \App\Models\Reading
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Device $device The Device the readings belong to
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function daily(Request $request, Device $device)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($device->readings('d', $page, $filter), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Displays a listing of all device readings grouped into weekly points paginated in divisons of 500
     *
     * Displays a listing of transformed reading points, belonging to the requested device, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.
     * 
     * @transformer \App\Transformers\ReadingTransformer
     * @transformermodel \App\Models\Reading
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Device $device The Device the readings belong to
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function weekly(Request $request, Device $device)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($device->readings('w', $page, $filter), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Displays a listing of all device readings grouped into monthly points paginated in divisons of 500
     *
     * Displays a listing of transformed reading points, belonging to the requested device, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.
     * 
     * @transformer \App\Transformers\ReadingTransformer
     * @transformermodel \App\Models\Reading
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Device $device The Device the readings belong to
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function monthly(Request $request, Device $device)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($device->readings('m', $page, $filter), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Displays a listing of all device readings grouped into yearly points paginated in divisons of 500
     *
     * Displays a listing of transformed reading points, belonging to the requested device, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.
     * 
     * @transformer \App\Transformers\ReadingTransformer
     * @transformermodel \App\Models\Reading
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Device $device The Device the readings belong to
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function yearly(Request $request, Device $device)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($device->readings('y', $page, $filter), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }
}
