<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Error;
use App\Transformers\ErrorTransformer;

/**
 * @resource Error
 *
 * Error represents error points in the influx database
 */
class ErrorController extends Controller
{
    /**
     * Displays a listing of all errors paginated in divisons of 500
     *
     * Displays a listing of transformed error points utilising fractal to provide include capabilities
     * 
     * @transformer \App\Transformers\ErrorTransformer
     * @transformermodel \App\Models\Error
     * @param \Illuminate\Http\Request $request The Request Data
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function index(Request $request)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);
        
        $resource = fractal(Error::retrieve(null, $page, $filter), new ErrorTransformer())
            ->withResourceName('error')
            ->toArray();

        return response()->json($resource);
    }

      
    /**
     * Displays a listing of all errors grouped into hourly points paginated in divisons of 500
     *
     * Displays a listing of transformed error points utilising fractal to provide include capabilities
     * 
     * @transformer \App\Transformers\ErrorTransformer
     * @transformermodel \App\Models\Error
     * @param \Illuminate\Http\Request $request The Request Data
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function hourly(Request $request)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal(Error::retrieve('h', $page, $filter), new ErrorTransformer())
            ->withResourceName('error')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Displays a listing of all errors grouped into daily points paginated in divisons of 500
     *
     * Displays a listing of transformed error points utilising fractal to provide include capabilities
     * 
     * @transformer \App\Transformers\ErrorTransformer
     * @transformermodel \App\Models\Error
     * @param \Illuminate\Http\Request $request The Request Data
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function daily(Request $request)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal(Error::retrieve('d', $page, $filter), new ErrorTransformer())
            ->withResourceName('error')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Displays a listing of all errors grouped into weekly points paginated in divisons of 500
     *
     * Displays a listing of transformed error points utilising fractal to provide include capabilities
     * 
     * @transformer \App\Transformers\ErrorTransformer
     * @transformermodel \App\Models\Error
     * @param \Illuminate\Http\Request $request The Request Data
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function weekly(Request $request)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal(Error::retrieve('w', $page, $filter), new ErrorTransformer())
            ->withResourceName('error')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Displays a listing of all errors grouped into monthly points paginated in divisons of 500
     *
     * Displays a listing of transformed error points utilising fractal to provide include capabilities
     * 
     * @transformer \App\Transformers\ErrorTransformer
     * @transformermodel \App\Models\Error
     * @param \Illuminate\Http\Request $request The Request Data
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function monthly(Request $request)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal(Error::retrieve('m', $page, $filter), new ErrorTransformer())
            ->withResourceName('error')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Displays a listing of all errors grouped into yearly points paginated in divisons of 500
     *
     * Displays a listing of transformed error points utilising fractal to provide include capabilities
     * 
     * @transformer \App\Transformers\ErrorTransformer
     * @transformermodel \App\Models\Error
     * @param \Illuminate\Http\Request $request The Request Data
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function yearly(Request $request)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal(Error::retrieve('y', $page, $filter), new ErrorTransformer())
            ->withResourceName('error')
            ->toArray();

        return response()->json($resource);
    }
}