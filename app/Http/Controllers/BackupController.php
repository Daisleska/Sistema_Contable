<?php

namespace App\Http\Controllers;
/*use Alert;*/
use App\Http\Requests;
use Artisan;
use Log;
use Storage;

class BackupController extends Controller
{
    public function index()
    {
        //Se debe crear la carpeta backups en el storage por que el no la crea 
        $backups = Storage::allFiles('public/backups');
        //dd($backups);
        return view('admin/backup/index')->with(compact('backups'));

    }

    public function create()
    {
        $filename = "Blatt-".date("d-m-Y-H-i-s").".sql";
        //Se debe hacer referencia al PATH del MYSQLDUMP CON EL \\ 
        $mysqlPath = "C:\\xampph\mysql\bin/mysqldump";
        //$mysqlPath = "C:\\wamp64/bin/mysql/mysql5.7.21/bin/mysqldump";
        //dd($mysqlPath);
        try {
            
            $command = "$mysqlPath --user=root --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " cesica  > " . storage_path() . "/app/public/backups/" . $filename."  2>&1";
            $returnVar = NULL;
            $output  = NULL;
            //dd($command);
            exec($command, $output, $returnVar);
            //dd($x);
           /* Alert::success('Operación realizada con éxito','¡Nuevo respaldo creado!');*/

            return redirect()->back();

        } catch(\Exception $e) {
                dd($e);
           /* Alert::error('Fallo en la operación', 'Error al restaurar la base de datos');
*/
            return redirect()->back();
        }
    }

    public function restore($file)
    {
        //Se debe hacer referencia al PATH del MYSQLDUMP
        //$mysqlPath = "C:\\xampp\mysql\bin/mysqldump";
        $mysqlPath = "C:\\wamp64/bin/mysql/mysql5.7.21/bin/mysqldump";
        try {

            $command = "$mysqlPath --user=root --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " cesica < " . storage_path() . "/app/public/backups/" . $file."  2>&1";
            $returnVar = NULL;
            $output  = NULL;
            
            exec($command, $output, $returnVar);

            /*Alert::success('Operación realizada con éxito','¡Base de datos restaurada!');*/

            return redirect()->back();
            
        } catch (\Exception $e) {

        /*    Alert::error('Fallo en la operación', 'Error al restaurar la base de datos');*/

            return redirect()->back();
        } 
    }

    /**
     * Downloads a backup zip file.
     *
     * TODO: make it work no matter the flysystem driver (S3 Bucket, etc).
     */
    public function download($filename)
    {
        
        $path = storage_path()."/app/public/backups/$filename";

        return response()->download($path);
    }

    /**
     * Deletes a backup file.
     */
    public function delete($filename)
    {
        \File::delete(storage_path() . "/app/public/backups/$filename");

       /* Alert::success('Operación realizada con éxito','¡Respaldo Eliminado!');*/

        return redirect()->back();
    }
}

