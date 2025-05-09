<?php

namespace App\Actions\Users;

use App\Models\User;
use App\Support\Actions\CreateActionInterface;
use Illuminate\Support\Str;

class UserCreateAction implements CreateActionInterface
{
    /**
     * @param User $user
     */
    public function __construct(
        private User $user
    ) {}

    /**
     * @param array $data
     *
     * @return User
     */
    public function execute(array $data): User
    {
        $this->user->fill([
            'uuid' => Str::uuid(),
            'active' => true,
            ...$data,
        ]);
        $this->user->save();

        return $this->user;
    }
}
