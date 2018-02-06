<?php

namespace App\Http\Controllers\Area;

use App\Models\Area;
use App\Models\Error;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\ErrorTransformer;

/**
 * @resource Area/Error
 *
 * This is the subresource of all errors belonging to a supplied area. An error belongs to an area if it belongs to a device in the area.
 */
class ErrorController extends Controller
{
    /**
     * Displays a listing of all an areas errors paginated in divisons of 500
     *
     * Displays a listing of transformed error points, belonging to the requested areas devices, utilising fractal to provide include capabilities
     * 
     * @transformer \App\Transformers\ErrorTransformer
     * @transformermodel \App\Models\Error
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Area $area The Area the errors belong to
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function index(Request $request, Area $area)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($area->errors(null, $page, $filter), new ErrorTransformer())
            ->withResourceName('error')
            ->toArray();

        return response()->json($resource);
    }
    
    /**
     * Displays a listing of all an areas errors grouped into hourly points paginated in divisons of 500
     *
     * Displays a listing of transformed error points, belonging to the requested areas devices, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.
     * 
     * @transformer \App\Transformers\ErrorTransformer
     * @transformermodel \App\Models\Error
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Area $area The Area the errors belong to
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function hourly(Request $request, Area $area)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($area->errors('h', $page, $filter), new ErrorTransformer())
            ->withResourceName('error')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Displays a listing of all an areas errors grouped into daily points paginated in divisons of 500
     *
     * Displays a listing of transformed error points, belonging to the requested areas devices, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.
     * 
     * @transformer \App\Transformers\ErrorTransformer
     * @transformermodel \App\Models\Error
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Area $area The Area the errors belong to
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function daily(Request $request, Area $area)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($area->errors('d', $page, $filter), new ErrorTransformer())
            ->withResourceName('error')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Displays a listing of all an areas errors grouped into weekly points paginated in divisons of 500
     *
     * Displays a listing of transformed error points, belonging to the requested areas devices, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.
     * 
     * @transformer \App\Transformers\ErrorTransformer
     * @transformermodel \App\Models\Error
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Area $area The Area the errors belong to
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function weekly(Request $request, Area $area)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($area->errors('w', $page, $filter), new ErrorTransformer())
            ->withResourceName('error')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Displays a listing of all an areas errors grouped into monthly points paginated in divisons of 500
     *
     * Displays a listing of transformed error points, belonging to the requested areas devices, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.
     * 
     * @transformer \App\Transformers\ErrorTransformer
     * @transformermodel \App\Models\Error
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Area $area The Area the errors belong to
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function monthly(Request $request, Area $area)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($area->errors('m', $page, $filter), new ErrorTransformer())
            ->withResourceName('error')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Displays a listing of all an areas errors grouped into yearly points paginated in divisons of 500
     *
     * Displays a listing of transformed error points, belonging to the requested areas devices, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.
     * 
     * @transformer \App\Transformers\ErrorTransformer
     * @transformermodel \App\Models\Error
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Area $area The Area the errors belong to
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function yearly(Request $request, Area $area)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($area->errors('y', $page, $filter), new ErrorTransformer())
            ->withResourceName('error')
            ->toArray();

        return response()->json($resource);
    }
}
