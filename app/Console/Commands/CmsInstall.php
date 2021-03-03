<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class CmsInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Instala el paquete laravel-cms.';

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
        $this->progressBar = $this->output->createProgressBar(3);
        $this->progressBar->minSecondsBetweenRedraws(0);
        $this->progressBar->maxSecondsBetweenRedraws(2);
        $this->progressBar->setRedrawFrequency(1);

        $this->progressBar->start();

        $this->info(' La instalación del paquete inició. Espere...');

        $this->progressBar->advance();

        $this->line(' Publicando assets y config');
        //Artisan::call('vendor:publish');

        $this->progressBar->advance();

        $this->line(" Ejecutando migraciones y seeders");
        Artisan::call('migrate --seed');

        $this->progressBar->finish();
        $this->info(' Paquete instalado con éxito.');
    }
}
