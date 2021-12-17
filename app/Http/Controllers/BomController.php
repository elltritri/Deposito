<?php

namespace App\Http\Controllers;

use App\Models\Bom;
use Illuminate\Http\Request;

class BomController extends Controller
{

    public function index()
    {
        $boms = Bom::paginate();

        return view('bom.index', compact('boms'))
            ->with('i', (request()->input('page', 1) - 1) * $boms->perPage());
    }


    public function create()
    {
        $bom = new Bom();
        return view('bom.create', compact('bom'));
    }

  
    public function store(Request $request)
    {
        request()->validate(Bom::$rules);

        $bom = Bom::create($request->all());

        return redirect()->route('boms.index')
            ->with('success', 'Bom created successfully.');
    }

    public function show($id)
    {
        $bom = Bom::find($id);

        return view('bom.show', compact('bom'));
    }


    public function edit($id)
    {
        $bom = Bom::find($id);

        return view('bom.edit', compact('bom'));
    }

    public function update(Request $request, Bom $bom)
    {
        request()->validate(Bom::$rules);

        $bom->update($request->all());

        return redirect()->route('boms.index')
            ->with('success', 'Bom updated successfully');
    }

    public function destroy($id)
    {
        $bom = Bom::find($id)->delete();

        return redirect()->route('boms.index')
            ->with('success', 'Bom deleted successfully');
    }
}
