<?php

namespace App\Http\Controllers\Api;

use App\Actions\Users\UserStoreAction;
use App\Actions\Users\UserUpdateAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserStoreRequest;
use App\Http\Requests\Api\UserUpdateRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    public function __construct(
        private UserStoreAction $storeAction,
        private UserUpdateAction $updateAction,
    ) {
    }

    public function index(): AnonymousResourceCollection
    {
        return UserResource::collection(User::all());
    }

    public function store(UserStoreRequest $request)
    {
        return new UserResource($this->storeAction->execute($request->all()));
    }

    public function show(User $user): UserResource
    {
        return new UserResource($user);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $this->updateAction->execute($user, $request->validated());

        return new UserResource($user);
    }

    public function destroy(User $user): JsonResponse
    {
        $this->updateAction->execute($user, ['active' => false]);

        return response()->json(['message' => 'User deleted'], 200);
    }
}
