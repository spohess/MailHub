<?php

namespace App\Actions\Users;

use App\Models\User;
use App\Support\Actions\StoreActionInterface;
use Illuminate\Support\Str;

class UserStoreAction implements StoreActionInterface
{
    /**
     * @param User $user
     */
    public function __construct(
        private User $user
    ) {
    }

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
