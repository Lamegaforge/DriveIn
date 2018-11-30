<?php

namespace App\Console\Commands\Users;

use App\Models;
use Illuminate\Console\Command;

class Admin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:admin {id}';

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
        $user = $this->retrieveUser();

        $this->showActualStatus($user);

        if (! $this->confirm('Voulez vous vraiment modifier le status administrateur de ' . $user->name)) {
            return;
        }

        $user = $this->switchAdminStatus($user);

        $this->output($user);
    }

    /**
     * @param  \Models\User $user
     * @return void
     */
    protected function showActualStatus(Models\User $user)
    {
        $status = ($user->admin) ? 'administrateur.' : 'simple utilisateur.';

        $this->info($user->name . ' est actuellement un ' . $status);
    }

    /**
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     * @return \App\Models\User
     */
    protected function retrieveUser() :Models\User
    {
        $id = $this->argument('id');

        return Models\User::findOrFail($id);
    }

    /**
     * @param \App\Models\User
     * @return \App\Models\User
     */
    protected function switchAdminStatus(Models\User $user) :Models\User
    {
        $user->admin = ! $user->admin; #habile !

        $user->save();

        return $user;
    }    

    /**
     * @param \App\Models\User $user
     * @param \App\Models\User $admin
     * @return mixed
     */
    protected function output(Models\User $user)
    {
        $qsdqs = ($user->admin) ? ' est désormais administrateur' : " n'est plus administrateur" ;

        $this->info("L'utilisateur " . $user->name . $qsdqs);
    }    
}
