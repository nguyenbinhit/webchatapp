<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\LoginRequest;
use App\Repositories\UserRepositoryInterface;
use App\Services\UserServiceInterface;
use Exception;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    /**
     * @var UserRepositoryInterface
     */
    protected $userRepository;

    /**
     * @var UserServiceInterface
     */
    protected $userService;

    public function __construct(UserServiceInterface $userService, UserRepositoryInterface $userRepository)
    {
        $this->userService = $userService;
        $this->userRepository = $userRepository;
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
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Login user
     */
    public function login(LoginRequest $request)
    {
        try {
            $data = $request->validated();

            $result = $this->userService->login($data);

            if (!$result) {
                return response()->json([
                    'message' => 'Login failed',
                    'errors' => [
                        'email' => [
                            'Email or password is incorrect'
                        ]
                    ]
                ], 400);
            }

            return response()->json([
                'data' => $result,
                'message' => 'Login successfully'
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Login failed',
                'errors' => [
                    'email' => [
                        'Email or password is incorrect'
                    ]
                ]
            ], 400);
        }
    }
}
