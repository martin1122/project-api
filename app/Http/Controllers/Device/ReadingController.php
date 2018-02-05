<?php

namespace App\Http\Controllers\Device;

use App\Models\Device;
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
    public function index(Request $request, Device $device)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($device->readings(null, $page, $filter), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hourly(Request $request, Device $device)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($device->readings('h', $page, $filter), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daily(Request $request, Device $device)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($device->readings('d', $page, $filter), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function weekly(Request $request, Device $device)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($device->readings('w', $page, $filter), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function monthly(Request $request, Device $device)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($device->readings('m', $page, $filter), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function yearly(Request $request, Device $device)
    {
        $filter = $request->query('filter', '');
        $filter = !empty($filter) ? explode(',', $filter) : [];
        $page = $request->query('page', 0);

        $resource = fractal($device->readings('y', $page, $filter), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }
}
