<?php

namespace App\Services\Production;

use App\Repositories\CodeRepositoryInterface;
use App\Repositories\Eloquent\CodeRepository;
use App\Services\CodeServiceInterface;
use Illuminate\Http\Request;

class CodeService extends BaseService implements CodeServiceInterface
{
    /**
     * Parameter
     *
     * @var CodeRepository
     */
    protected $repository;

    /**
     * Constructor
     *
     * @param CodeRepository $repository
     */
    public function __construct(CodeRepositoryInterface $repository)
    {
        $this->repository = $repository;
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
        $new_data = [
            'code' => $data['code'],
            'note' => $data['note'] ?? null,
            'status' => $data['status'],
        ];

        return $this->repository->create($new_data);
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
        $update_data = [
            'code' => $data['code'],
            'note' => $data['note'] ?? null,
            'status' => $data['status'],
        ];

        return $this->repository->update($update_data, $id);
    }
}
