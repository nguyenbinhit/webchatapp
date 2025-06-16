<?php

namespace App\Services\Production;

use App\Repositories\Eloquent\UserRepository;
use App\Repositories\UserRepositoryInterface;
use App\Services\UserServiceInterface;
use Illuminate\Support\Facades\Auth;

class UserService extends BaseService implements UserServiceInterface
{
    /**
     * Parameter
     *
     * @var UserRepository
     */
    protected $repository;

    /**
     * Constructor
     *
     * @param UserRepositoryInterface $repository
     */
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Login
     *
     * @param array $data
     * @return void|array|bool|\App\Models\User
     */
    public function login($data)
    {
        $user = $this->repository->login($data);

        if (!$user) return false;

        $token = $user->createToken('BearerTokenTKCN')->plainTextToken;

        return [
            'user' => $user,
            'bearer_token' => $token
        ];
    }

    /**
     * Update user information
     *
     * @param array $data
     * @param mixed $id
     * @return \App\Models\User
     */
    public function update(array $data, $id)
    {
        $user = $this->repository->update($data, $id);

        return $user;
    }
}
