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
        $producto = DB::table('boms')->select('producto')->groupby('producto')->pluck('producto'); 
        $modelo = DB::table('boms')->select('modelo')->groupby('modelo')->pluck('modelo');
        $factura=DB::table('listadofacturas')->select('numeroFactura')->groupby('numeroFactura')->pluck('numeroFactura',);
        return view('admin.compararBF', compact('factura','modelo','producto'));
        }
    public function compararDatosingenieria(Request $request){
        $producto =  $request->producto;
        $modelo   =  $request->modelo;  
        $factura =  $request->factura;
        // $consulta = DB::table('boms')->select('partCode','partName','cantidad')->where('producto','=',$producto)->where('modelo','=',$modelo);
        return view('admin.comparacionBF', compact('producto'));
    }

    public function indexproducto()
    {
        $productos = Producto::paginate();

        return view('producto.index', compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

    }

    

