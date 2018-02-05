<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lava;

class GraphController extends Controller
{	
	/**
	 * [index description]
	 * @return [type] [description]
	 */
    public function index(Request $request)
    {

		$readings = Lava::DataTable();


		$readings->addDateColumn('Date')
		             ->addNumberColumn('Reading')
		             ->addRow(['2014-10-1',  67])
		             ->addRow(['2014-10-2',  68])
		             ->addRow(['2014-10-3',  68])
		             ->addRow(['2014-10-4',  72])
		             ->addRow(['2014-10-5',  61])
		             ->addRow(['2014-10-6',  70])
		             ->addRow(['2014-10-7',  74])
		             ->addRow(['2014-10-8',  75])
		             ->addRow(['2014-10-9',  69])
		             ->addRow(['2014-10-10', 64])
		             ->addRow(['2014-10-11', 59])
		             ->addRow(['2014-10-12', 65])
		             ->addRow(['2014-10-13', 66])
		             ->addRow(['2014-10-14', 75])
		             ->addRow(['2014-10-15', 76])
		             ->addRow(['2014-10-16', 71])
		             ->addRow(['2014-10-17', 72])
		             ->addRow(['2014-10-18', 63]);

		// dd($readings);

		Lava::LineChart('Readings', $readings, [
		    'title' => 'Readings'
		], 'readings-div');

		return view('graphs');

    }
}
