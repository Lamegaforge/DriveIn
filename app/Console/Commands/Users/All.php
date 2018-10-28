<?php

namespace App\Console\Commands\Users;

use App\Models;
use Illuminate\Console\Command;

class All extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:all';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

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
        $users = Models\User::with(['permissions', 'token'])->select(['id', 'name'])->get();

        $this->table(['id', 'name', 'token', 'permissions', 'admin'], $this->transform($users));
    }

    /**
     * @param  \App\Models\User $users
     * @return array
     */
    protected function transform($users)
    {
        return $users->map(function($user){
            return [
                'id' => $user->id,
                'name' => $user->name,
                'token' => $user->token->value ?? null,
                'permissions' => implode(', ', $user->permissions->pluck('name')->toArray()),
                'admin' => $user->admin,
            ];
        })->toArray();
    }
}
