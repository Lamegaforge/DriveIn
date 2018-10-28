<?php

namespace App\Console\Commands;

use App\Models;
use Illuminate\Console\Command;

class Free extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'token:free';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        // $headers = ['maked_by', 'assigned_to', 'value'];

        $tokens = Models\Token::with('maker')->free()->get();

        dd($tokens);
        // $this->table($headers, $tokens->toArray());
    }
}
