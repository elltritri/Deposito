<?php

namespace App\Http\Controllers;

use App\Models\Deposito;
use Illuminate\Http\Request;


class DepositoController extends Controller
{    
    public function index()
        {
            $depositos = Deposito::paginate();

        return view('deposito.index', compact('depositos'))
            ->with('i', (request()->input('page', 1) - 1) * $depositos->perPage());
        }

    public function create()
        {
            $deposito = new Deposito();
        return view('deposito.create', compact('deposito'));
        }

    public function store(Request $request)
        {
            request()->validate(Deposito::$rules);
            $deposito = Deposito::create($request->all());

        return redirect()->route('deposito.index')
            ->with('success', 'Deposito created successfully.');
        }

    public function show($id)
        {
            $deposito = Deposito::find($id);
        return view('deposito.show', compact('deposito'));
        }

    
    public function edit($id)
    {
        $deposito = Deposito::find($id);

        return view('deposito.edit', compact('deposito'));
    }

   
    public function update(Request $request, Deposito $deposito)
    {
        request()->validate(Deposito::$rules);

        $deposito->update($request->all());

        return redirect()->route('deposito.index')
            ->with('success', 'Deposito updated successfully');
    }

  
    public function destroy($id)
    {
        $deposito = Deposito::find($id)->delete();

        return redirect()->route('deposito.index')
            ->with('success', 'Deposito deleted successfully');
    }

   
}
