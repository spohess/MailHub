<?php

namespace App\Actions\Users;

use App\Support\Actions\UpdateActionInterface;
use Illuminate\Database\Eloquent\Model;

class UserUpdateAction implements UpdateActionInterface
{
    public function execute(Model $model, array $data): Model
    {
        $model->update($data);

        return $model;
    }
}
