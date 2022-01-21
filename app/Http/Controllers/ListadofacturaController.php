<?php

namespace App\Http\Controllers;
use       App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\facturaimport;
use App\Mail\IngresodeDatosMailable;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

use App\Models\Listadofactura;



class ListadofacturaController extends Controller
{

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

    
}
