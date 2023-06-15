<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;


class SeriesController extends Controller
{
    public function index()
    {

        $series = Serie::query()->orderBy('nome')->get();
        $status = session()->get('status');

        return view('series.index')->with('series', $series)->with('status', $status);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nome' => ['required', 'min:3']
        ]);

        $serie = Serie::create($request->all());

        return to_route('series.index')->with('status', "Serie  '$serie->nome' adicionada com sucesso");
    }

    public function edit(Serie $serie)
    {
        return view('series.edit')->with('serie', $serie);
    }

    public function update(Serie $serie, Request $request)
    {

        $serie->fill($request->all());
        $serie->save();

        return to_route('series.index')->with('status', "Serie  '$serie->nome' editada com sucesso");
    }

    public function destroy(Serie $serie)
    {
        Serie::destroy($serie->id);

        return to_route('series.index')->with('status', "Serie '$serie->nome' removida com sucesso");
    }

    public function enrase()
    {
        Serie::truncate();

        return to_route('series.index')->with('status', 'Series removidas com sucesso');
    }
}
