<?php

namespace RetailOne\Console\Commands;

use Illuminate\Console\Command;
use RetailOne\Role;
use RetailOne\User;

class CreateAdminUser extends Command {
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'coreproc:createadmin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates an admin user. Assumed we have Entrust installed and setup properly';

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
        $username         = $this->ask('Username: ');
        $email            = $this->ask('Email: ');
        $password         = $this->secret('Password: ');
        $password_confirm = $this->secret('Repeat Password: ');

        if ($this->confirm('Proceed with admin user creation?') && strcmp($password, $password_confirm) == 0) {
            $user = User::create([
                'name'     => $username,
                'email'    => $email,
                'password' => bcrypt($password)
            ]);

            $role = Role::where('name', 'admin')->first();

            if (!$role) {
                $role               = new Role;
                $role->name         = 'admin';
                $role->display_name = 'Admin';
                $role->description  = 'Administrator';
                $role->save();
            }

            $user->attachRole($role);

            $this->info('You can now login to your application');
        }
    }
}
