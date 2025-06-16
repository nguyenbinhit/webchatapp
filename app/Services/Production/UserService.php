<?php

namespace App\Services\Production;

use App\Repositories\Eloquent\UserRepository;
use App\Repositories\UserRepositoryInterface;
use App\Services\UserServiceInterface;

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
     * @return void|bool|\App\Models\User
     */
    public function login($data)
    {
        return $this->repository->login($data);
    }
}
