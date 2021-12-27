<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\bomImport;
use App\models\Bom;
use App\models\ListaProducto;
use App\Mail\IngresodeDatosMailable;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function ingresar(){
        return view('admin.ingresar');
    }

    public function ingresarDatos(Request $request ){
        
                $file = $request->file('file');
                Excel::import(new bomImport , $file);
                $datos = DB::table('boms')
                    ->where('numeroFactura',null)
                    ->update([  'numeroFactura' => $request->numeroFactura,
                                'guia'=>$request->guia,
                                'producto'=>$request->producto,
                                'modelo'=>$request->modelo,
                                ]);

                $correo = new IngresodeDatosMailable;
                    Mail::to('osvaldo.godoy@kmgfueguina.com.ar')->send($correo);
                
                $bom = Bom::all();
            
                return view('admin.mostrar', compact('bom'));
    }
    
    public function importar(){

        $bom=DB::table('boms')->select('numeroFactura')->groupby('numeroFactura')->pluck('numeroFactura',);
        $listaDepo= listaproducto::all();
        return view('admin.importar',compact('bom','listaDepo'));
    }

    public function importarDatos(Request $request){

        $listaDepo = ListaProducto::create($request->all());

        return redirect()->route('admin.importar')
            ->with('success', 'ListaDepo created successfully.');
    }
    
    
    public function comparar(){
            
            $bom = Bom::all();
            
            return view('admin.comparar', compact('bom'));

            }
        
    }
    

