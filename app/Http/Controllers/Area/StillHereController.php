<?php

namespace App\Http\Controllers\Area;

use App\Models\Area;
use App\Models\StillHere;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\StillHereTransformer;

/**
 * @resource Area/StillHere
 *
 * This is the subresource of all still heres belonging to a supplied area. A still here belongs to an area if it belongs to a device in the area.
 */
class StillHereController extends Controller
{
    /**
     * Displays a listing of all an areas still heres paginated in divisons of 500
     *
     * Displays a listing of transformed still here points, belonging to the requested area's devices, utilising fractal to provide include capabilities
     * 
     * @transformer \App\Transformers\StillHereTransformer
     * @transformermodel \App\Models\StillHere
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Area $area The Area the still heres belong to
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function index(Request $request, Area $area)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($area->stillHeres(null, $page, $filter), new StillHereTransformer())
            ->withResourceName('still_here')
            ->toArray();

        return response()->json($resource);
    }
    
    /**
     * Displays a listing of all an areas still heres grouped into hourly points paginated in divisons of 500
     *
     * Displays a listing of transformed still here points, belonging to the requested areas devices, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.
     * 
     * @transformer \App\Transformers\StillHereTransformer
     * @transformermodel \App\Models\StillHere
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Area $area The Area the still heres belong to
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function hourly(Request $request, Area $area)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($area->stillHeres('h', $page, $filter), new StillHereTransformer())
            ->withResourceName('still_here')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Displays a listing of all an areas still heres grouped into daily points paginated in divisons of 500
     *
     * Displays a listing of transformed still here points, belonging to the requested areas devices, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.
     * 
     * @transformer \App\Transformers\StillHereTransformer
     * @transformermodel \App\Models\StillHere
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Area $area The Area the still heres belong to
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function daily(Request $request, Area $area)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($area->stillHeres('d', $page, $filter), new StillHereTransformer())
            ->withResourceName('still_here')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Displays a listing of all an areas still heres grouped into weekly points paginated in divisons of 500
     *
     * Displays a listing of transformed still here points, belonging to the requested areas devices, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.
     * 
     * @transformer \App\Transformers\StillHereTransformer
     * @transformermodel \App\Models\StillHere
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Area $area The Area the still heres belong to
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function weekly(Request $request, Area $area)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($area->stillHeres('w', $page, $filter), new StillHereTransformer())
            ->withResourceName('still_here')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Displays a listing of all an areas still heres grouped into monthly points paginated in divisons of 500
     *
     * Displays a listing of transformed still here points, belonging to the requested areas devices, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.
     * 
     * @transformer \App\Transformers\StillHereTransformer
     * @transformermodel \App\Models\StillHere
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Area $area The Area the still heres belong to
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function monthly(Request $request, Area $area)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($area->stillHeres('m', $page, $filter), new StillHereTransformer())
            ->withResourceName('still_here')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Displays a listing of all an areas still heres grouped into yearly points paginated in divisons of 500
     *
     * Displays a listing of transformed still here points, belonging to the requested areas devices, utilising fractal to provide include capabilities. Each of the points are made through averaging together points occupying the grouped time interval.
     * 
     * @transformer \App\Transformers\StillHereTransformer
     * @transformermodel \App\Models\StillHere
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Area $area The Area the still heres belong to
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function yearly(Request $request, Area $area)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($area->stillHeres('y', $page, $filter), new StillHereTransformer())
            ->withResourceName('still_here')
            ->toArray();

        return response()->json($resource);
    }
}
