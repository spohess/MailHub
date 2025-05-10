<?php

namespace App\Actions\Users;

use App\Models\User;
use App\Support\Actions\StoreActionInterface;
use Illuminate\Support\Str;

class UserStoreAction implements StoreActionInterface
{
    public function __construct(
        private User $user
    ) {
    }

    public function execute(array $data): User
    {
        $this->user->fill([
            'uuid' => Str::uuid(),
            'active' => true,
            'administrator' => true,
            ...$data,
        ]);
        $this->user->save();

        return $this->user;
    }
}
