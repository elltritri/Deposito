<?php
namespace App\Http\Controllers;
use App\Models\Deposito;
use App\Models\Estados_producto;
use App\Models\Depositogracca;
use App\Models\Listadofactura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        $Ingreso->estado = 1;
        $Ingreso->deposito= 1;
        $Ingreso->id_usuario=auth()->id();
        $Ingreso->save();
            return response()->json($Ingreso);
        ;}

    public function ingresoVencimiento(Request $request, $id){

       $Vencimiento = Depositogracca::find($id);
       $Vencimiento->partCode = $request->partCode;
       $Vencimiento->cantidad = $request->cantidad;
       $Vencimiento->fechaVencimiento = Carbon::now($request->fechaVencimiento);
       $Vencimiento->save();
            $depositograccas= DB::table('listadofacturas')->groupBy('numeroFactura')->get();
               return view('depositogracca.index', compact('depositograccas'));
       
        ;}

    public function listadeposito(){
        $estados_producto=Estados_producto::pluck('Descripcion','id');
        $deposito = deposito::pluck('Descripcion','id');
        $lista=DB::table('depositograccas')->where('deposito','=', 1)->get();
            return view('depositogracca.listadoproducto', compact('lista','deposito','estados_producto'));}

    public function listadoPanol(){
        $estados_producto=Estados_producto::pluck('Descripcion','id');
        $deposito = deposito::pluck('Descripcion','id');
        $lista=DB::table('depositograccas')->where('deposito','=', 2)->get();
            return view('depositogracca.listadoproducto', compact('lista','deposito','estados_producto'));
        }
    public function listadoAire(){
        $estados_producto=Estados_producto::pluck('Descripcion','id');
        $deposito = deposito::pluck('Descripcion','id');
        $lista=DB::table('depositograccas')->where('deposito','=', 3)->get();
            return view('depositogracca.listadoproducto', compact('lista','deposito','estados_producto'));
        }
    public function listadoTv(){
        $estados_producto=Estados_producto::pluck('Descripcion','id');
        $deposito = deposito::pluck('Descripcion','id');
        $lista=DB::table('depositograccas')->where('deposito','=', 4)->get();
            return view('depositogracca.listadoproducto', compact('lista','deposito','estados_producto'));
        }
    public function listadoCelulares(){
        $estados_producto=Estados_producto::pluck('Descripcion','id');
        $deposito = deposito::pluck('Descripcion','id');
        $lista=DB::table('depositograccas')->where('deposito','=', 5)->get();
            return view('depositogracca.listadoproducto', compact('lista','deposito','estados_producto'));
        }
        
    public function listadoMicroondas(){
        $estados_producto=Estados_producto::pluck('Descripcion','id');
        $deposito = deposito::pluck('Descripcion','id');
        $lista=DB::table('depositograccas')->where('deposito','=', 6)->get();
            return view('depositogracca.listadoproducto', compact('lista','deposito','estados_producto'));}

    public function listadoSmt(){
        $estados_producto=Estados_producto::pluck('Descripcion','id');
        $deposito = deposito::pluck('Descripcion','id');
        $lista=DB::table('depositograccas')->where('deposito','=', 7)->get();
            return view('depositogracca.listadoproducto', compact('lista','deposito','estados_producto'));}

    public function listadoHeladera(){
        $estados_producto=Estados_producto::pluck('Descripcion','id');
        $deposito = deposito::pluck('Descripcion','id');
        $lista=DB::table('depositograccas')->where('deposito','=', 8)->orderby('fechaVencimiento','desc')->get();
            return view('depositogracca.listadoproducto', compact('lista','deposito','estados_producto'));}
    
    

    
    


    public function envio ( Request $request, $id){
        $estados_producto=Estados_producto::pluck('Descripcion','id');
        $deposito = deposito::pluck('Descripcion','id');
        $lista=DB::table('depositograccas')->get();

        $envio = Depositogracca::find($id);
        $envio->deposito = $request->deposito;
        $envio->save();
        

        return view('depositogracca.listadoproducto', compact('lista','deposito','estados_producto'));
    }
    public function actualizarestadoproducto ( Request $request, $id){
        $estados_producto=Estados_producto::pluck('Descripcion','id');
        $deposito = deposito::pluck('Descripcion','id');
        $lista=DB::table('depositograccas')->get();

        $envio = Depositogracca::find($id);
        
        $envio->estado = $request->estados_producto;
        $envio->save();
        

        return view('depositogracca.listadoproducto', compact('lista','deposito','estados_producto'));
    }

}
