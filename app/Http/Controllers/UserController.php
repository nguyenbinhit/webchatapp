<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\UserResource;
use App\Services\UserServiceInterface;
use Exception;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends BaseController
{
    /**
     * @var UserServiceInterface
     */
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Login user
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        try {
            $data = $request->validated();

            $result = $this->userService->login($data);

            if (!$result) {
                return $this->errorData('Login failed', 400, [
                    'email' => 'Email không chính xác',
                    'password' => 'Mật khẩu không chính xác'
                ]);
            }

            $json = [
                'user' => new UserResource($result['user']),
                'bearer_token' => $result['bearer_token'],
                'message' => 'Login successfully'
            ];

            return response()->json($json, 200);
        } catch (Exception $e) {
            return $this->internalServerError();
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     */
    public function update(UpdateRequest $request, string $id)
    {
        try {
            $data = $request->validated();

            if (isset($data['password']) && $data['password']) {
                $data['password'] = Hash::make($data['password']);
            }

            $user = $this->userService->update($data, $id);

            if (!$user) return $this->notFound();

            return (new UserResource($user))->additional($this->displayMessageUpdate());
        } catch (Exception $e) {
            return $this->internalServerError();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
