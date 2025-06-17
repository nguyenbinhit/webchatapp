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
     * @param ClientRepositoryInterface $repository
     * @param CodeRepositoryInterface $codeRepository
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
        $code = $this->codeRepository->getByCode($data['code']);

        if (!$code) return false;

        $client = $this->repository->login($data);
        if (!$client) {
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

    /**
     * Create a new record
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->repository->create($data);
    }

    /**
     * Update an existing record
     *
     * @param array $data
     * @param mixed $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        return $this->repository->update($data, (int) $id);
    }

    /**
     * Show a specific record
     *
     * @param mixed $id
     * @return mixed
     */
    public function show($id)
    {
        return $this->repository->show((int) $id);
    }

    /**
     * Delete a record
     *
     * @param mixed $id
     * @return bool
     */
    public function delete($id)
    {
        return $this->repository->delete((int) $id);
    }
}
