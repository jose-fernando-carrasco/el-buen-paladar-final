<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\OfertaEspecial;

class AlterRecords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'alter:column';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Altera la columna';

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
         DB::table('oferta_especials')
            ->where('id', 4)
            ->update(['estado' => '0']);
            return back();
        $this->info('La columna a sido alterada');
        return 0;
    }
}
