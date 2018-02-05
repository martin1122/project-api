<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Error;
use App\Transformers\ErrorTransformer;

class ErrorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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