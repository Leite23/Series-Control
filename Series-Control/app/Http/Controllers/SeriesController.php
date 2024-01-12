<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SeriesController extends Controller
{
    public function index(Request $request){

        $request->get(key: 'id');
        $series = [
            'Suits',
            'Peaky Blinders',
            'Break in Bad'
        ];

    return view('series.index', compact('series'));
    }
    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        $nomedaSerie = $request->input('nome');
        DB::insert('INSERT INTO series (nome) VALUES (?)', [$nome]);
    }
    

}
