<?php

namespace App\Http\Controllers\Area;

use App\Models\Area;
use App\Models\Reading;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transformers\ReadingTransformer;

class ReadingController extends Controller
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

        $resource = fractal($area->readings(null, $page, $filter), new ReadingTransformer())
            ->withResourceName('reading')
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

        $resource = fractal($area->readings('h', $page, $filter), new ReadingTransformer())
            ->withResourceName('reading')
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

        $resource = fractal($area->readings('d', $page, $filter), new ReadingTransformer())
            ->withResourceName('reading')
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

        $resource = fractal($area->readings('w', $page, $filter), new ReadingTransformer())
            ->withResourceName('reading')
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

        $resource = fractal($area->readings('m', $page, $filter), new ReadingTransformer())
            ->withResourceName('reading')
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

        $resource = fractal($area->readings('y', $page, $filter), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }
}
