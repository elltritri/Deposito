<?php

namespace App\Http\Controllers;

use App\Models\Listaproducto;
use Illuminate\Http\Request;

/**
 * Class ListaproductoController
 * @package App\Http\Controllers
 */
class ListaproductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaproductos = Listaproducto::paginate();

        return view('listaproducto.index', compact('listaproductos'))
            ->with('i', (request()->input('page', 1) - 1) * $listaproductos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listaproducto = new Listaproducto();
        return view('listaproducto.create', compact('listaproducto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Listaproducto::$rules);

        $listaproducto = Listaproducto::create($request->all());

        return redirect()->route('listaproductos.index')
            ->with('success', 'Listaproducto created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listaproducto = Listaproducto::find($id);

        return view('listaproducto.show', compact('listaproducto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listaproducto = Listaproducto::find($id);

        return view('listaproducto.edit', compact('listaproducto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Listaproducto $listaproducto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listaproducto $listaproducto)
    {
        request()->validate(Listaproducto::$rules);

        $listaproducto->update($request->all());

        return redirect()->route('listaproductos.index')
            ->with('success', 'Listaproducto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $listaproducto = Listaproducto::find($id)->delete();

        return redirect()->route('listaproductos.index')
            ->with('success', 'Listaproducto deleted successfully');
    }
}
