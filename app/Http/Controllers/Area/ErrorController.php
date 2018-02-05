<?php

namespace App\Http\Controllers\Area;

use App\Models\Area;
use App\Models\Error;
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
