<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reading;
use App\Transformers\ReadingTransformer;

/**
 * @resource Reading
 *
 * Reading represents readings points in the influx database
 */
class ReadingController extends Controller
{
    /**
     * Displays a listing of all readings paginated in divisons of 500
     *
     * Displays a listing of transformed reading points utilising fractal to provide include capabilities
     * 
     * @transformer \App\Transformers\ReadingTransformer
     * @transformermodel \App\Models\Reading
     * @param \Illuminate\Http\Request $request The Request Data
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function index(Request $request)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal(Reading::retrieve(null, $page, $filter), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }
    
    /**
     * Displays a listing of all readings grouped into hourly points paginated in divisons of 500
     *
     * Displays a listing of transformed reading points utilising fractal to provide include capabilities
     * 
     * @transformer \App\Transformers\ReadingTransformer
     * @transformermodel \App\Models\Reading
     * @param \Illuminate\Http\Request $request The Request Data
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function hourly(Request $request)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal(Reading::retrieve('h', $page, $filter), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Displays a listing of all readings grouped into daily points paginated in divisons of 500
     *
     * Displays a listing of transformed reading points utilising fractal to provide include capabilities
     * 
     * @transformer \App\Transformers\ReadingTransformer
     * @transformermodel \App\Models\Reading
     * @param \Illuminate\Http\Request $request The Request Data
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function daily(Request $request)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal(Reading::retrieve('d', $page, $filter), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Displays a listing of all readings grouped into weekly points paginated in divisons of 500
     *
     * Displays a listing of transformed reading points utilising fractal to provide include capabilities
     * 
     * @transformer \App\Transformers\ReadingTransformer
     * @transformermodel \App\Models\Reading
     * @param \Illuminate\Http\Request $request The Request Data
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function weekly(Request $request)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal(Reading::retrieve('w', $page, $filter), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Displays a listing of all readings grouped into monthly points paginated in divisons of 500
     *
     * Displays a listing of transformed reading points utilising fractal to provide include capabilities
     * 
     * @transformer \App\Transformers\ReadingTransformer
     * @transformermodel \App\Models\Reading
     * @param \Illuminate\Http\Request $request The Request Data
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function monthly(Request $request)
    {   
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal(Reading::retrieve('m', $page, $filter), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Displays a listing of all readings grouped into yearly points paginated in divisons of 500
     *
     * Displays a listing of transformed reading points utilising fractal to provide include capabilities
     * 
     * @transformer \App\Transformers\ReadingTransformer
     * @transformermodel \App\Models\Reading
     * @param \Illuminate\Http\Request $request The Request Data
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function yearly(Request $request)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal(Reading::retrieve('y', $page, $filter), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }
}
