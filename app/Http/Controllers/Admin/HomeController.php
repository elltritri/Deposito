<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\bomImport;
use App\Imports\facturaimport;
use App\models\Bom;
use App\models\ListaProducto;
use App\models\Listadofactura;
use App\Mail\IngresodeDatosMailable;
use Illuminate\Support\Facades\Mail;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

class HomeController extends Controller
{
    public function index(){
        return view('admin.index');
    }
 
    // DATOS DE FACTURA
    public function ingresarFactura(){
 
        return view('admin.ingresarFactura');
    }
    public function ingresarDatosFactura(Request $request ){
 
        $file = $request->file('file');
                Excel::import(new facturaimport , $file);
                $datos = DB::table('listadofacturas')
                    ->where('numeroFactura',null)
                    ->update([  'numeroFactura' => $request->numeroFactura,
                                'guia'=>$request->guia,
                                'producto'=>$request->producto,
                                'modelo'=>$request->modelo,
                                ]);
                $correo = new IngresodeDatosMailable;
                    Mail::to('osvaldo.godoy@kmgfueguina.com.ar')->send($correo);
                $listaFact= DB::table('listadofacturas')->groupBy('numeroFactura')->get();
                return view('admin.mostrarFactura', compact('listaFact'));
    }
    public function mostrarFactura(){
        $listaFact= DB::table('listadofacturas')->groupBy('numeroFactura')->get();
        return view('admin.mostrarFactura', compact('listaFact'));
    }
    public function mostrarDatosFactura($numeroFactura){
        $numero=$numeroFactura;
        $listaFact= DB::table('listadofacturas')->where('numeroFactura','=',$numeroFactura)->get();
        

        return view('admin.mostrarDatosFactura',compact('numero','listaFact'));
    }
    // DATOS DE BOM
    public function ingresarBom(){
        $numerobom= DB::table('boms')->max('id_bom');
       
        return view('admin.ingresarBom', compact('numerobom'));
    }
    public function ingresarDatosBom(Request $request ){
        $file = $request->file('file');
        Excel::import(new bomimport , $file);
        
        $datos = DB::table('boms')  
        ->where('producto',null)                
        ->update(['producto'=>$request->producto,'modelo'=>$request->modelo,'id_bom'=>$request->numeroBom]);
                        
                                    
        
        $correo = new IngresodeDatosMailable;
        Mail::to('osvaldo.godoy@kmgfueguina.com.ar')->send($correo);
        
        $bom = bom::all();
        
        return view('admin.mostrarBom', compact('bom'));
    }
    public function mostrarDatosBom(){
        $bom = bom::all();
        
        return view('admin.mostrarBom',compact('bom'));
    }
    
    
    // DATOS DE IMPORTACION
    public function importar(){

        $bom=DB::table('listadofacturas')->select('numeroFactura')->groupby('numeroFactura')->pluck('numeroFactura',);
        $listaDepo= listaproducto::all();
        return view('admin.importar',compact('bom','listaDepo'));
    }

    public function importarDatos(Request $request){

        $listaDepo = ListaProducto::create([
                                    'numeroFactura' => $request->numeroFactura,
                                    'guia'=>$request->guia,
                                    'producto'=>$request->producto,
                                    'modelo'=>$request->modelo,
                                ]);

        return redirect()->route('admin.importar')
            ->with('success', 'ListaDepo created successfully.');
    }
    // COMPARACIONES
    public function comparar(){
            $bom = Bom::all();
            return view('admin.comparar', compact('bom'));
            }
    public function compararBF(){
        $bom = Bom::all();
        $factura = Listadofactura::all();
        return view('admin.compararBF', compact('bom'));
        }
  

    }

    

