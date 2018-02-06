<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use App\Transformers\AreaTransformer;

/**
 * @resource Area
 *
 * Represents the concept of an area, such as a river or city which has devices. Areas can contain other areas to potentially even represent a country and its various divisions
 */
class AreaController extends Controller
{
    /**
     * Displays a listing of all areas paginated
     *
     * Displays a listing of transformed area objects utilising fractal to provide include and pagination capabilities
     * 
     * @transformer \App\Transformers\AreaTransformer
     * @transformermodel \App\Models\Area
     * @param \Illuminate\Http\Request $request The Request Data
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function index(Request $request)
    {
        $resource = fractal(Area::paginate(), new AreaTransformer())
            ->withResourceName('area')
            ->toArray();

        return response()->json($resource);
    }

    /**
     * Displays a single area's data request via its id
     *
     * Returns a transformed item of the area model utilising fractal to provide include capatabilities
     * 
     * @transformer \App\Transformers\AreaTransformer
     * @transformermodel \App\Models\Area
     * @param \Illuminate\Http\Request $request The Request Data
     * @param \App\Models\Area $area The Area item wanted
     * @return \Illuminate\Http\Response The transformed json response
     */
    public function show(Request $request, Area $area) 
    {
        $resource = fractal($area, new AreaTransformer())
        ->withResourceName('area')
        ->toArray();

        return response()->json($resource);
    }
}
