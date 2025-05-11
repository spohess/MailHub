<?php

namespace App\Console\Commands;

use App\Actions\Users\UserStoreAction;
use App\Notifications\NewUserPasswordNotification;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class MakeAdministratorCommand extends Command
{
    protected $signature = 'appmake:administrator {email}';

    protected $description = 'Command for create admin user';

    public function handle()
    {
        $password = Str::random(12);
        $data = [
            'name' => 'Administrator',
            'email' => $this->argument('email'),
            'password' => bcrypt($password),
            'administrator' => true,
        ];
        $user = app()->make(UserStoreAction::class)->execute($data);
        $user->notify(new NewUserPasswordNotification(['password' => $password]));

        $this->alert('User created successfully and the password was sent to the email provided');
    }
}
