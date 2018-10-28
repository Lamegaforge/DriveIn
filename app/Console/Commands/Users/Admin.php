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
    protected $signature = 'users:admin {id} {admin}';

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

        if (! $this->confirm('Voulez vous vraiment modifier le status administrateur de ' . $user->name)) {
            return;
        }

        $user = $this->switchAdminStatus($user);

        $this->output($user);
    }

    /**
     * @return \App\Models\User
     */
    protected function retrieveUser()
    {
        $id = $this->argument('id');

        return Models\User::findOrFail($id);
    }

    /**
     * @param \App\Models\User
     * @return \App\Models\User
     */
    protected function switchAdminStatus($user)
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
    protected function output($user, $admin)
    {
        $qsdqs = ($user->admin) ? ' est désormais administrateur' : " n'est plus administrateur" ;

        $this->info("L'utilisateur " . $user->name . $qsdqs);
    }    
}
