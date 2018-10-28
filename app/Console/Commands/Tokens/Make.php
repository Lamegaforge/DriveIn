<?php

namespace App\Console\Commands\Tokens;

use App\Models;
use App\Services\TokenService;
use Illuminate\Console\Command;

class Make extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tokens:make';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create a token';
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
     * @param  \App\Services\TokenService $tokenService
     * @return mixed
     */
    public function handle(TokenService $tokenService)
    {
        $token = $tokenService->generate();

        $this->saveToken($token);

        $this->info('Token generated : ' . $token);
    }

    /**
     * @param  string $token
     * @return void
     */
    protected function saveToken(string $token) :void
    {
        Models\Token::create([
            'value' => $token,
        ]);
    }
}
