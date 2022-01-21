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

class BomController extends Controller
{
    // DATOS DE BOM
    public function ingresarBom(){
        $numerobom= DB::table('boms')->max('id_boms');
        return view('admin.ingresarBom', compact('numerobom'));
        }

    public function ingresarDatosBom(Request $request ){
        $file = $request->file('file');
        Excel::import(new bomimport , $file);

        
        
        
        $datos = DB::table('boms')  
            ->where('producto',null)                
            ->update(['id_boms'=>$request->numeroBom,'producto'=>$request->producto,'modelo'=>$request->modelo,'codproducto'=>$request->codproducto, 'cantidad' => $lota]);
        
        $correo = new IngresodeDatosMailable; Mail::to('osvaldo.godoy@kmgfueguina.com.ar')->send($correo);
       

        
        $listabom= DB::table('boms')->groupBy('modelo')->get();
        // $listabom = bom::all();
        return view('admin.mostrarBom', compact('listabom'));
        }

    public function mostrarBom(){
        $listabom= DB::table('boms')->groupBy('modelo')->get();
        return view('admin.mostrarBom',compact('listabom'));
        }

    public function mostrarDatosBom(){
        $listabom = bom::all();
        return view('admin.mostrarDatosBom', compact('listabom'));
        }
}
