<?php

namespace App\Http\Controllers\Area;

use App\Models\Area;
use App\Models\Reading;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\ReadingTransformer;

/**
 * @resource Area/Reading
 *
 * This is the subresource of all readings belonging to a supplied area. A reading belongs to an area if it belongs to a device in the area.
 */
class ReadingController extends Controller
{
    /**
     * Displays a listing of all an areas readings paginated in divisons of 500
     *
     * Displays a listing of transformed reading points, belonging to the requested area's devices, utilising fractal to provide include capabilities
     * 
     * @transformer \App\Transformers\ReadingTransformer
     * @transformermodel \App\Models\Reading
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Area $area The Area the readings belong to
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function index(Request $request, Area $area)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($area->readings(null, $page, $filter), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }
    
    /**
     * Displays a listing of all an areas readings grouped into hourly points paginated in divisons of 500
     *
     * Displays a listing of transformed reading points, belonging to the requested areas devices, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.
     * 
     * @transformer \App\Transformers\ReadingTransformer
     * @transformermodel \App\Models\Reading
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Area $area The Area the readings belong to
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function hourly(Request $request, Area $area)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($area->readings('h', $page, $filter), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Displays a listing of all an areas readings grouped into daily points paginated in divisons of 500
     *
     * Displays a listing of transformed reading points, belonging to the requested areas devices, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.
     * 
     * @transformer \App\Transformers\ReadingTransformer
     * @transformermodel \App\Models\Reading
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Area $area The Area the readings belong to
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function daily(Request $request, Area $area)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($area->readings('d', $page, $filter), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Displays a listing of all an areas readings grouped into weekly points paginated in divisons of 500
     *
     * Displays a listing of transformed reading points, belonging to the requested areas devices, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.
     * 
     * @transformer \App\Transformers\ReadingTransformer
     * @transformermodel \App\Models\Reading
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Area $area The Area the readings belong to
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function weekly(Request $request, Area $area)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($area->readings('w', $page, $filter), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Displays a listing of all an areas readings grouped into monthly points paginated in divisons of 500
     *
     * Displays a listing of transformed reading points, belonging to the requested areas devices, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.
     * 
     * @transformer \App\Transformers\ReadingTransformer
     * @transformermodel \App\Models\Reading
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Area $area The Area the readings belong to
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function monthly(Request $request, Area $area)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($area->readings('m', $page, $filter), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Displays a listing of all an areas readings grouped into yearly points paginated in divisons of 500
     *
     * Displays a listing of transformed reading points, belonging to the requested areas devices, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.
     * 
     * @transformer \App\Transformers\ReadingTransformer
     * @transformermodel \App\Models\Reading
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Area $area The Area the readings belong to
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function yearly(Request $request, Area $area)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($area->readings('y', $page, $filter), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }
}
