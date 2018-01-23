<?php

namespace App\Http\Controllers\Device;

use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\Reading;
use App\Transformers\ReadingTransformer;

class ReadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($device)
    {
        $resource = fractal($device->readings(), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hourly($device, $offset = 0)
    {
        $resource = fractal($device->readings('h', $offset), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daily($device, $offset = 0)
    {
        $resource = fractal($device->readings('d', $offset), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function weekly($device, $offset = 0)
    {
        $resource = fractal($device->readings('w', $offset), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function monthly($device, $offset = 0)
    {
        $resource = fractal($device->readings('m', $offset), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function yearly($device, $offset = 0)
    {
        $resource = fractal($device->readings('y', $offset), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }
}
