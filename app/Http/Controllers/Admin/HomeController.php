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
        
        // $primera = DB::table('boms')
        //             ->join('listadofacturas', function ($join) {
        //                 $join   ->on('listadofacturas.partCode', '=', 'boms.partCode')
        //                          ->where('boms.partCode','<>', 'listadofacturas.partCode');
        //                 })
        //             ->where('boms.id_boms','=',$boms)
        //             ;
        // $segunda = DB::table('listadofacturas')
        //             ->join('boms', function ($join) {
        //                 $join   ->on('boms.partCode', '=', 'listadofacturas.partCode')
        //                          ->where('listadofacturas.partCode','<>','boms.partCode');
        //                 })
        //             ->where('listadofacturas.numeroFactura','=',$factura)
        //             ->union($primera)
        //             ->get()
        //             ;

        // $primera = DB::table('boms')
        //             ->leftjoin('listadofacturas','boms.partCode','=','listadofacturas.partCode')
        //             ->where('listadofacturas.partCode','is',null)
        //             ->where('id_boms','=',$boms);

        // $segunda = DB::table('listadofacturas')
        //             ->leftjoin('boms','listadofacturas.partCode','=','boms.partCode')
        //             ->where('boms.partCode','is',null)
        //             ->where('numeroFactura','=',$factura)
        //             ->union($primera)
        //             ->get();   
        
        $sql='select * from boms A LEFT OUTER JOIN listadofacturas B on A.partCode = B.partCode Where B.partCode IS NULL and A.id_boms='.$boms.' 
        UNION 
        select * from listadofacturas A LEFT OUTER JOIN boms B on A.partCode = B.partCode Where B.partCode IS NULL and A.numeroFactura = '.$factura;
        $segunda = DB::select($sql);


        return view('admin.comparacionBF', compact('segunda'));
    }

    public function indexproducto()
    {
        $productos = Producto::paginate();

        return view('producto.index', compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

    }

    

