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

    }

      
    public function createDataBase(){        
        $query = $this->model->createDataBase();
        
        switch($query){

            case '1':
                $mensaje = ['success-message' => 'Base de datos creada'];
                break; 

            case '0':
                $mensaje = ['error-message' => 'La base de datos ya fue creada'];
                break;

            case '2002':
                $mensaje = ['error-message' => 'Encienda su servidor MySQL'];
                break;
            
            default:
                $mensaje = ['error-message' => 'Error desconocido, intente más tarde'];
                break;        
        }
        
        return redirect()->back()->with($mensaje);
    }


    public function createTable(){
        $query = $this->model->createTable();

        switch($query){

            case '1':
                $mensaje = ['success-message' => 'Tabla creada correctamente'];
                break;  

            case '0':
                $mensaje = ['error-message' => 'La tabla ya fue creada'];
                break;
            
            case '2002':
                $mensaje = ['error-message' => 'Encienda su servidor MySQL'];
                break;
            
            case '1049':
                $message = 'La base de datos aún no ha sido creada';
                break;
            
            default:
                $mensaje = ['error-message' => 'Error desconocido, intente más tarde'];
                break;     
                   
        }
        return redirect()->back()->with($mensaje);
    }


    public function generatePDF(){
        try {
            $productos = Producto::all();
        } catch (\Exception $e) {
            Return redirect()->back()->with(['error-message' => 'Asegurese antes de tener creada la base de datos y la tabla']);
        }
        
        if($productos->count()>0){
            $pdf = Pdf::loadView('includes.report',['productos' => $productos]);
            return $pdf->stream();
        }
        else{
            return redirect()->back()->with(['error-message' => 'No hay productos registrados']);
        }
        
    }

    public function backup(){
        try {
            $dump = new IMysqldump\Mysqldump('mysql:host=127.0.1.1;dbname=bdunad01', 'root', '12345678');
            $dump->start('../dump.sql');
            return redirect()->back()->with(['success-message' => 'Backup creado con exito']);
            
        } 
        catch (\Exception $e) {
            return redirect()->back()->with(['error-message' => 'Verifique que la base de datos exista y que tiene permisos de escritura en la carpeta raíz del proyecto']);
        }

    }

}
