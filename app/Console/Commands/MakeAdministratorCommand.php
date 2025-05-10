<?php

namespace App\Console\Commands;

use App\Actions\Users\UserStoreAction;
use App\Notifications\NewUserPasswordNotification;
use Illuminate\Console\Command;

class MakeAdministratorCommand extends Command
{
    /**
     * @var string
     */
    protected $signature = 'appmake:administrator {email}';

    /**
     * @var string
     */
    protected $description = 'Command for create admin user';

    /**
     * @return void
     */
    public function handle()
    {
        $password = fake()->password() . fake()->password();
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
