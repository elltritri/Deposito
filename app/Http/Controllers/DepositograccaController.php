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
        $productos = DB::table('depositograccas')->where('numeroFactura','=',$numeroFactura)->GET();

        return view('depositogracca.indexfactura', compact('factura','guia','producto','modelo','productos'))
    ;}
 
    public function ingresoproducto(Request $request){

        $Ingreso = new Depositogracca;

        $Ingreso->guia = $request->input('guia');
        $Ingreso->numeroFactura = $request->input('numeroFactura');
        $Ingreso->producto = $request->input('producto');
        $Ingreso->modelo = $request->input('modelo');
        $Ingreso->partCode = $request->input('partCode');
        $Ingreso->cantidad = $request->input('cantidad');

        $Ingreso->save();
        return response()->json($Ingreso);
    ;}

    public function listadeposito(){

        $lista=DB::table('depositograccas')->get();

        return view('depositogracca.listadoproducto', compact('lista'));
        
    }
}
