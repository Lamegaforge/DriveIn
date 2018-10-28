<?php

namespace App\Console\Commands\Users;

use App\User\Models;
use Illuminate\Console\Command;

class Show extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:show {id}';

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
        $id = $this->argument('id');

        $user = Models\User::with('permissions')->select(['id', 'name'])->find($id);

        $this->table(['id', 'name', 'permissions'], $this->transform($user));
    }

    protected function transform(Models\User $user)
    {
        return [
            [
                'id' => $user->id,
                'name' => $user->name,
                'permissions' => implode(', ', $user->permissions->toArray()),
            ]
        ];
    }
}
