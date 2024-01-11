<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request){

        $request->get(key: 'id');
        $series = [
            'Suits',
            'Peaky Blinders',
            'Break in Bad'
        ];

    return view('series.index', [
        'series' => $series
    ]);
    }
}
