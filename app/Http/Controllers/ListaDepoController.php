<?php

namespace App\Http\Controllers;

use App\Models\ListaDepo;
use Illuminate\Http\Request;

/**
 * Class ListaDepoController
 * @package App\Http\Controllers
 */
class ListaDepoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaDepo = ListaDepo::paginate();

        return view('lista-depo.index', compact('listaDepo'))
            ->with('i', (request()->input('page', 1) - 1) * $listaDepos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listaDepo = new ListaDepo();
        return view('lista-depo.create', compact('listaDepo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ListaDepo::$rules);

        $listaDepo = ListaDepo::create($request->all());

        return redirect()->route('lista-depos.index')
            ->with('success', 'ListaDepo created successfully.');
    }

    
    public function show($id)
    {
        $listaDepo = ListaDepo::find($id);

        return view('lista-depo.show', compact('listaDepo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listaDepo = ListaDepo::find($id);

        return view('lista-depo.edit', compact('listaDepo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ListaDepo $listaDepo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListaDepo $listaDepo)
    {
        request()->validate(ListaDepo::$rules);

        $listaDepo->update($request->all());

        return redirect()->route('lista-depos.index')
            ->with('success', 'ListaDepo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $listaDepo = ListaDepo::find($id)->delete();

        return redirect()->route('lista-depos.index')
            ->with('success', 'ListaDepo deleted successfully');
    }
}
