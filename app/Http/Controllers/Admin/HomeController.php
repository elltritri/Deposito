<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\bomImport;
use App\Imports\facturaimport;
use App\Mail\IngresodeDatosMailable;
use Illuminate\Support\Facades\Mail;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

use App\models\Bom;
use App\models\ListaProducto;
use App\models\Listadofactura;


class HomeController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('admin.index');
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
        $boms = DB::table('boms')->select('id_boms')->groupby('id_boms')->pluck('id_boms','id_boms');
        $factura=DB::table('listadofacturas')->select('numeroFactura')->groupby('numeroFactura')->pluck('numeroFactura','numeroFactura');
        return view('admin.compararBF', compact('factura','boms'));
        }

    public function compararDatosingenieria(Request $request){
        
        $boms   =  $request->boms;  
        $factura =  $request->numeroFactura;
        
        // $sql =  'SELECT t1.partCode, t1.partName FROM boms T1 LEFT JOIN listadofacturas T2 ON T1.partCode = T2.partCode WHERE T2.partCode IS NULL and T1.id_boms='.$boms.' 
        //         UNION 
        //         SELECT t2.partCode, t2.partName FROM listadofacturas T2 LEFT JOIN boms T1 ON T1.partCode = T2.partCode WHERE T1.partCode IS NULL and T2.numeroFactura='.$factura.'';

        // $segunda = DB::select($sql);        
        $sql1 =  'SELECT t1.partCode, t1.partName FROM boms T1 LEFT JOIN listadofacturas T2 ON T1.partCode = T2.partCode WHERE T2.partCode IS NULL and T1.id_boms='.$boms.'';
        $primera = DB::select($sql1);
        $sql2 = 'SELECT t2.partCode, t2.partName FROM listadofacturas T2 LEFT JOIN boms T1 ON T1.partCode = T2.partCode WHERE T1.partCode IS NULL and T2.numeroFactura='.$factura.'';
        $segunda = DB::select($sql2);

        // $primera = DB::table('boms as T1')
        //         ->selectRaw('T1.*')
        //         ->selectRaw('T2.*')
        //         ->leftJoin('listadofacturas as T2', 'T1.partCode', '=', 'T2.partCode')
        //         ->whereNull('T2.partCode')
        //         ->where('T1.id_boms', $boms);
        // $definitiva = DB::table('listadofacturas as T2')
        //         ->selectRaw('T1.*')
        //         ->selectRaw('T2.*')
        //         ->leftJoin('boms as T1', 'T2.partCode', '=', 'T1.partCode')
        //         ->whereNull('T1.partCode')
        //         ->where('T2.numeroFactura', $factura);
        
        // $segunda = $primera->union($definitiva)->get();
        
            return view('admin.comparacionBF',compact('primera','segunda','factura','boms'));
        
        
    }

    public function indexproducto()
    {
        $productos = Producto::paginate();

        return view('producto.index', compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

    }

    

