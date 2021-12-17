<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\bomImport;
use App\models\Bom;
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

    public function importar(){

        
        return view('admin.importar');
    }
    
    public function importarDatos(Request $request ){
        
        // $nF = DB::table('boms')->select('COUNT(numeroFactura)')->where('numeroFactura','=',$request->numeroFactura)->get();
                $file = $request->file('file');
                Excel::import(new bomImport , $file);
                $datos = DB::table('boms')
                    ->where('numeroFactura',null)
                    ->update(['numeroFactura' => $request->numeroFactura]);

                $correo = new IngresodeDatosMailable;
                    Mail::to('osvaldo.godoy@kmgfueguina.com.ar')->send($correo);
                
                $bom = Bom::all();
            
                return view('admin.mostrar', compact('bom'));
        }

        public function comparar(){
            
            $bom = Bom::all();
            
            return view('admin.comparar', compact('bom'));

            }
        
    }
    

