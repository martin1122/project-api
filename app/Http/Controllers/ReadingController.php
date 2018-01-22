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
    public function index()
    {
        $reading = new Reading;

        $resource = fractal($reading->retrieve(), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function daily($offset = 0)
    {
        $reading = new Reading;

        $resource = fractal($reading->retrieve('d', $offset), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hourly($offset = 0)
    {
        $reading = new Reading;

        $resource = fractal($reading->retrieve('h', $offset), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function weekly($offset = 0)
    {
        $reading = new Reading;

        $resource = fractal($reading->retrieve('w', $offset), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function monthly($offset = 0)
    {
        $reading = new Reading;

        $resource = fractal($reading->retrieve('m', $offset), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function yearly($offset = 0)
    {
        $reading = new Reading;

        $resource = fractal($reading->retrieve('y', $offset), new ReadingTransformer())
            ->withResourceName('reading')
            ->toArray();

        return response()->json($resource);
    }
}
