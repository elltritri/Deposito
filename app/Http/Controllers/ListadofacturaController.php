<?php

namespace App\Http\Controllers;

use App\Models\Listadofactura;
use Illuminate\Http\Request;

/**
 * Class ListadofacturaController
 * @package App\Http\Controllers
 */
class ListadofacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listadofacturas = Listadofactura::paginate();

        return view('listadofactura.index', compact('listadofacturas'))
            ->with('i', (request()->input('page', 1) - 1) * $listadofacturas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listadofactura = new Listadofactura();
        return view('listadofactura.create', compact('listadofactura'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Listadofactura::$rules);

        $listadofactura = Listadofactura::create($request->all());

        return redirect()->route('listadofacturas.index')
            ->with('success', 'Listadofactura created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listadofactura = Listadofactura::find($id);

        return view('listadofactura.show', compact('listadofactura'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listadofactura = Listadofactura::find($id);

        return view('listadofactura.edit', compact('listadofactura'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Listadofactura $listadofactura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listadofactura $listadofactura)
    {
        request()->validate(Listadofactura::$rules);

        $listadofactura->update($request->all());

        return redirect()->route('listadofacturas.index')
            ->with('success', 'Listadofactura updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $listadofactura = Listadofactura::find($id)->delete();

        return redirect()->route('listadofacturas.index')
            ->with('success', 'Listadofactura deleted successfully');
    }
}
