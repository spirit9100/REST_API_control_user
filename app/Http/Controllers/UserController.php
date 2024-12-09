<?php

namespace App\Http\Controllers;

use App\Http\Filters\UserFilter;
use App\Http\Requests\User\UserFilterRequest;
use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(UserFilterRequest $request)
    {
        //
        $data = $request->validated();
        $filter = app()->make(UserFilter::class, ['queryParams' => array_filter($data)]);
        $users = User::filter($filter)->paginate(10)->withQueryString();

        return new UserCollection($users);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function store(UserStoreRequest $request)
    {

        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return UserResource|\Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        //

        try {
            $user = User::findorFail($id);
        } catch (ModelNotFoundException) {

            return response()->json(
                [
                    'message' => "Пользователь c id {$id} не найден",
                ], 404);

        }
        return new UserResource($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return UserResource|\Illuminate\Http\JsonResponse
     */
    public function update(UserUpdateRequest $request, int $id)
    {
        //
        try {
            $user = User::findorFail($id);
        } catch (ModelNotFoundException) {
            return response()->json(
                [
                    'message' => "Пользователь c id {$id} не найден",
                ], 404);
        }
        $validated = $request->validated();

        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user->update($validated);
        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        //
        $user = User::find($id);
        if ($user !== null) {
            $user->delete();
            return response()->json(['message' => "Пользователь c удалён"], 200);
        } else {
            return response()->json(['message' => "Пользователь c id {$id} не найден"], 404);
        }
    }
}
