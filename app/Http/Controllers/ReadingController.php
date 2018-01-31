<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reading;
use App\Transformers\ReadingTransformer;

class ReadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? $request->explode(',', $filter) : [];

        $resource = fractal(Reading::retrieve(null, $filter), new ReadingTransformer())
            ->withResourceName('reading')
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
        $filter = !empty($filter) ? $request->explode(',', $filter) : [];

        $resource = fractal(Reading::retrieve('h', $filter), new ReadingTransformer())
            ->withResourceName('reading')
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
        $filter = !empty($filter) ? $request->explode(',', $filter) : [];

        $resource = fractal(Reading::retrieve('d', $filter), new ReadingTransformer())
            ->withResourceName('reading')
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
        $filter = !empty($filter) ? $request->explode(',', $filter) : [];

        $resource = fractal(Reading::retrieve('w', $filter), new ReadingTransformer())
            ->withResourceName('reading')
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
        $filter = !empty($filter) ? $request->explode(',', $filter) : [];

        $resource = fractal(Reading::retrieve('m', $filter), new ReadingTransformer())
            ->withResourceName('reading')
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
        $filter = !empty($filter) ? $request->explode(',', $filter) : [];

        $resource = fractal(Reading::retrieve('y', $filter), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }
}
