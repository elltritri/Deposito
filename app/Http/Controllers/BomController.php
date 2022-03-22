<?php

namespace App\Http\Controllers;
use       App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\bomImport;
use App\Mail\IngresodeDatosMailable;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

use App\Models\Bom;
use App\Models\Producto;

class BomController extends Controller
{
    // DATOS DE BOM
    public function ingresarBom(){
        $producto = Producto::pluck('Descripcion','id');
        $numerobom= DB::table('boms')->max('id_boms');
        return view('admin.ingresarBom', compact('numerobom','producto'));
        }

    public function ingresarDatosBom(Request $request ){
        $listabom= DB::table('boms')->groupBy('modelo')->get();

       
            $file = $request->file('file');
            Excel::import(new bomimport , $file);
            $datos = DB::table('boms')  
                ->where('producto',null)                
                ->update(['id_boms'=>$request->numeroBom,'producto'=>$request->producto,'modelo'=>$request->modelo,'codproducto'=>$request->codproducto]);
            $correo = new IngresodeDatosMailable; Mail::to('osvaldo.godoy@kmgfueguina.com.ar')->send($correo);
            

            return view('admin.mostrarBom', compact('listabom'));
        }

    public function mostrarBom(){
        $listabom= DB::table('boms')->groupBy('id_boms')->get();
        return view('admin.mostrarBom',compact('listabom'));
        }

    public function mostrarDatosBom($id_boms){
        $listabom = DB::table('boms')->where('id_boms','=',$id_boms)->get();
        return view('admin.mostrarDatosBom', compact('listabom'));
        }

    public function editarDatosBom(Request $request,$id_boms){
        $listabom = DB::table('boms')->where('id_boms','=',$id_boms)->get();

        $editar = Bom::find($id_boms);
        $editar->partCode = $request->partCode;
        $editar->codigoAlternativo = $request->codigoAlternativo;
        $editar->partName = $request->partName;
        $editar->cantidad = $request->cantidad;
        
        $editar->save();
             

        return view('admin.mostrarDatosBom', compact('listabom'));
        }
}
