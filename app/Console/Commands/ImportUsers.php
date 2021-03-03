<?php

namespace App\Console\Commands;

use App\Imports\UsersImport;
use Illuminate\Console\Command;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\QueryException;

class ImportUsers extends Command
{
    /**
    * The name and signature of the console command.
    *
    * @var string
    */
    protected $signature = 'import:users';

    /**
    * The console command description.
    *
    * @var string
    */
    protected $description = 'Importa usuarios desde el archivo users.xlsx';

    /**
    * Create a new command instance.
    *
    * @return void
    */
    public function __construct()
    {
        parent::__construct();
    }

    /**
    * Execute the console command.
    *
    * @return int
    */
    public function handle()
    {
        try {

            Excel::import(new UsersImport, storage_path('app\users.xlsx'));
            $this->info('Usuarios importados exitosamente');

        } catch (FileNotFoundException | QueryException $th) {

            if($th instanceof FileNotFoundException) {
                $this->error('No se encuentra el archivo users.xlsx');
            }else {
                $this->error('Hubo un problema en la base de datos');
            }

        }
    }
}
