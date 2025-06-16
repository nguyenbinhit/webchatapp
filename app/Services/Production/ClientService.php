<?php

namespace App\Services\Production;

use App\Models\Client;
use App\Repositories\ClientRepositoryInterface;
use App\Repositories\CodeRepositoryInterface;
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
     * Code Repository
     *
     * @var CodeRepositoryInterface
     */
    protected $codeRepository;

    /**
     * Constructor
     *
     * @param ClientRepository $repository
     */
    public function __construct(ClientRepositoryInterface $repository, CodeRepositoryInterface $codeRepository)
    {
        $this->repository = $repository;
        $this->codeRepository = $codeRepository;
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

        if (!$client) {
            $code = $this->codeRepository->getByCode($data['code']);

            $client = $this->repository->create([
                'name' => $data['name'] ?? $data['phone'],
                'phone' => $data['phone'],
                'code' => $data['code'],
                'code_id' => $code ? $code->id : null,
            ]);
        }

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
