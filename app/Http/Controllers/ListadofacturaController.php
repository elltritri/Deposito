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
use App\Models\Producto;
use App\Models\Factura;



class ListadofacturaController extends Controller
{

        // DATOS DE FACTURA
        public function ingresarFactura(){
            $producto = Producto::pluck('Descripcion','id');
            return view('admin.ingresarFactura', compact('producto'));
        }

        public function ingresarDatosFactura(Request $request ){
            $factura = Factura::create($request->all());
            // DB::table('facturas')->insert(
            //     [   'guia' => $request->guia, 
            //         'numeroFactura' => $request->numeroFactura, 
            //         'modelo' => $request->modelo, 
            //         'lote' => $request->lote, 
            //         'producto' => $request->producto
            //         ]);
                       
            $lote=$request->lote;

            $file = $request->file('file');
                    Excel::import(new facturaimport , $file);
            $datos = DB::table('listadofacturas')
                        ->where('numeroFactura',null)
                        ->update([  'numeroFactura' => $request->numeroFactura,
                                    'guia'=>$request->guia,
                                    'producto'=>$request->producto,
                                    'modelo'=>$request->modelo,
                        ]);
            $upd='Update listadofacturas set cantidad=cantidad*'.$lote.' where numeroFactura='.$request->numeroFactura.'';
            $datos1= DB::select($upd);
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
