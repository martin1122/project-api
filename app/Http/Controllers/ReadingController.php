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

        $resource = fractal($reading->retrieveOneMonth(), new ReadingTransformer())->withResourceName('reading')->toArray();

        return response()->json($resource);
    }
}
