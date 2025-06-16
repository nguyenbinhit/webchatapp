<?php

namespace App\Services\Production;

use App\Models\Client;
use App\Repositories\ClientRepositoryInterface;
use App\Repositories\Eloquent\ClientRepository;
use App\Services\ClientServiceInterface;
use Illuminate\Http\Request;

class ClientService extends BaseService implements ClientServiceInterface
{
    /**
     * Parameter
     *
     * @var ClientRepository
     */
    protected $repository;

    /**
     * Constructor
     *
     * @param ClientRepository $repository
     */
    public function __construct(ClientRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Login
     *
     * @param array $data
     * @return void|bool|Client
     */
    public function login($data)
    {
        $client = $this->repository->login($data);

        return $client ?: false;
    }

    /**
     * Get all records
     *
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function getAll(Request $request)
    {
        $clients = $this->repository->getAll($request);

        return $clients;
    }
}
