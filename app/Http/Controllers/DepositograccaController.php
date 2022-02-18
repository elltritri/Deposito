<?php
namespace App\Http\Controllers;
use App\Models\Depositogracca;
use App\Models\Listadofactura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DepositograccaController extends Controller {
    
    public function index(){   
        $depositograccas= DB::table('listadofacturas')->groupBy('numeroFactura')->get();
        return view('depositogracca.index', compact('depositograccas'));}

    public function create(){
        $depositogracca = new Depositogracca();
        return view('depositogracca.create', compact('depositogracca'));}

    public function store(Request $request){
        request()->validate(Depositogracca::$rules);
        $depositogracca = Depositogracca::create($request->all());
        return redirect()->route('depositogracca.index')
            ->with('success', 'Depositogracca created successfully.');}

    public function show($id){
        $depositogracca = Depositogracca::find($id);
        return view('depositogracca.show', 
                            compact('depositogracca'));}
 
    public function edit($id){
        $nrofactura = DB::table('listadofacturas')
                            ->select('numeroFactura')
                            ->where('id','=',$id);
        $factura = DB::table('listadofacturas')
                            ->where('numeroFactura','=',$nrofactura);
        return view('depositogracca.indexfactura', 
                            compact('factura'));}
 
    public function update(Request $request, Depositogracca $depositogracca){
        request()->validate(Depositogracca::$rules);
        $depositogracca->update($request->all());
        return redirect()->route('depositogracca.index')
            ->with('success', 'Depositogracca updated successfully');}

    public function destroy($id){
        $depositogracca = Depositogracca::find($id)->delete();
        return redirect()->route('depositogracca.index')
            ->with('success', 'Depositogracca deleted successfully');}

    public function agregaradepositogracca($numeroFactura){
        $factura=$numeroFactura;
        $guia= DB::table('listadofacturas')->select('guia')->where('numeroFactura','=',$numeroFactura)->groupby('guia')->get();
        $producto= DB::table('listadofacturas')->select('producto')->where('numeroFactura','=',$numeroFactura)->groupby('producto')->get();
        $modelo= DB::table('listadofacturas')->select('modelo')->where('numeroFactura','=',$numeroFactura)->groupby('modelo')->get();


        return view('depositogracca.indexfactura', compact('factura','guia','producto','modelo'))
        
        ;}

}
