<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Transformers\AreaTransformer;

class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $resource = fractal(Area::all(), new AreaTransformer())
            ->withResourceName('area')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Area $area) 
    {
        $resource = fractal($area, new AreaTransformer())
        ->withResourceName('area')
        ->toArray();

        return response()->json($resource);
    }
}
