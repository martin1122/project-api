<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StillHere;
use App\Transformers\StillHereTransformer;

/**
 * @resource StillHere
 *
 * StillHere represents still_heres points in the influx database
 */
class StillHereController extends Controller
{
    /**
     * Displays a listing of all still_heres paginated in divisons of 500
     *
     * Displays a listing of transformed still here points utilising fractal to provide include capabilities
     * 
     * @transformer \App\Transformers\StillHereTransformer
     * @transformermodel \App\Models\StillHere
     * @param \Illuminate\Http\Request $request The Request Data
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function index(Request $request)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal(StillHere::retrieve(null, $page, $filter), new StillHereTransformer())
            ->withResourceName('still_here')
            ->toArray();

        return response()->json($resource);
    }
    
    /**
     * Displays a listing of all still_heres grouped into hourly points paginated in divisons of 500
     *
     * Displays a listing of transformed still here points utilising fractal to provide include capabilities
     * 
     * @transformer \App\Transformers\StillHereTransformer
     * @transformermodel \App\Models\StillHere
     * @param \Illuminate\Http\Request $request The Request Data
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function hourly(Request $request)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal(StillHere::retrieve('h', $page, $filter), new StillHereTransformer())
            ->withResourceName('still_here')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Displays a listing of all still_heres grouped into daily points paginated in divisons of 500
     *
     * Displays a listing of transformed still here points utilising fractal to provide include capabilities
     * 
     * @transformer \App\Transformers\StillHereTransformer
     * @transformermodel \App\Models\StillHere
     * @param \Illuminate\Http\Request $request The Request Data
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function daily(Request $request)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal(StillHere::retrieve('d', $page, $filter), new StillHereTransformer())
            ->withResourceName('still_here')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Displays a listing of all still_heres grouped into weekly points paginated in divisons of 500
     *
     * Displays a listing of transformed still here points utilising fractal to provide include capabilities
     * 
     * @transformer \App\Transformers\StillHereTransformer
     * @transformermodel \App\Models\StillHere
     * @param \Illuminate\Http\Request $request The Request Data
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function weekly(Request $request)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal(StillHere::retrieve('w', $page, $filter), new StillHereTransformer())
            ->withResourceName('still_here')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Displays a listing of all still heres grouped into monthly points paginated in divisons of 500
     *
     * Displays a listing of transformed still here points utilising fractal to provide include capabilities
     * 
     * @transformer \App\Transformers\StillHereTransformer
     * @transformermodel \App\Models\StillHere
     * @param \Illuminate\Http\Request $request The Request Data
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function monthly(Request $request)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal(StillHere::retrieve('m', $page, $filter), new StillHereTransformer())
            ->withResourceName('still_here')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Displays a listing of all still heres grouped into yearly points paginated in divisons of 500
     *
     * Displays a listing of transformed still here points utilising fractal to provide include capabilities
     * 
     * @transformer \App\Transformers\StillHereTransformer
     * @transformermodel \App\Models\StillHere
     * @param \Illuminate\Http\Request $request The Request Data
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function yearly(Request $request)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal(StillHere::retrieve('y', $page, $filter), new StillHereTransformer())
            ->withResourceName('still_here')
            ->toArray();

        return response()->json($resource);
    }
}
