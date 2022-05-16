<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Producto;
use Ifsnop\Mysqldump as IMysqldump;
use Barryvdh\DomPDF\Facade\Pdf;





class AdminController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new Admin;

        $this->errorCode = [
            'HY000' => 'La base de datos ya fue creada',
            '42S01' => 'La tabla ya existe',
            '42000' => 'Debe crear la base de datos antes de crear la tabla'
        ];
    }

      
    public function createDataBase(){        
        $query = $this->model->createDataBase();    
            if($query){      
                $mensaje = ['success-message' => 'Base de datos creada'];     
            }
            else{
                $mensaje = ['error-message' => 'Es posible que la base de datos ya exista o su servidor MySQL este apagado'];              
            }
            return redirect()->route('index')->with($mensaje);
    }

        


    public function createTable(){
        $query = $this->model->createTable();
        if($query){
            $mensaje = [
                'success-message' => 'Tabla creada correctamente'
            ];
        }

        elseif($query == '0'){
            $mensaje = [
                'error-message' => 'La tabla ya fue creada'
            ];
        }

        elseif($query == '3'){
            $mensaje = [
                'error-message' => 'Debe crear la base de datos antes de intentar crear la tabla'
            ];
        }

        
        return redirect()->route('index')->with($mensaje);
    }


    public function generatePDF(){
        try {
            $productos = Producto::all();
        } catch (\Exception $e) {
            Return redirect()->route('index')->with(['error-message' => 'Asegurese antes de tener creada la base de datos y la tabla']);
        }
        
        
        if($productos->count()>0){
            $pdf = Pdf::loadView('includes.report',['productos' => $productos]);
            return $pdf->stream();
        }
        else{
            return redirect()->route('index')->with(['error-message' => 'No hay productos registrados']);
        }
        
        
    }

    public function backup(){
        try {
            $dump = new IMysqldump\Mysqldump('mysql:host=127.0.1.1;dbname=bdunad01', 'root', '12345678');
            $dump->start('../dump.sql');
            return redirect()->route('index')->with(['success-message' => 'Backup creado con exito']);
            
        } 
        catch (\Exception $e) {
            return redirect()->route('index')->with(['error-message' => 'Verifique que la base de datos exista y que tiene permisos de escritura en la carpeta raíz del proyecto']);
        }

    }

}
