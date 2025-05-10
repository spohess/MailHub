<?php

namespace App\Support\Actions;

use Illuminate\Database\Eloquent\Model;

interface UpdateActionInterface
{
    public function execute(Model $model, array $data);
}
