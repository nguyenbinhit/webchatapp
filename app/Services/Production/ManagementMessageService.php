<?php

namespace App\Services\Production;

use App\Repositories\Eloquent\ManagementMessageRepository;
use App\Repositories\ManagementMessageRepositoryInterface;
use App\Services\ManagementMessageServiceInterface;
use Illuminate\Http\Request;

class ManagementMessageService extends BaseService implements ManagementMessageServiceInterface
{
    /**
     * Parameter
     *
     * @var ManagementMessageRepository
     */
    protected $repository;

    /**
     * Constructor
     *
     * @param ManagementMessageRepositoryInterface $repository
     */
    public function __construct(ManagementMessageRepositoryInterface $repository)
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
            'image_url' => $data['image_url'] ?? null,
            'account' => $data['account'] ?? null,
            'content' => $data['content'] ?? null,
            'status' => $data['status'], // Default to active
            'custom_time' => $data['custom_time'] ?? null,
            'is_hidden' => $data['is_hidden'] ?? 0
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
        $new_data = [
            'image_url' => $data['image_url'],
            'account' => $data['account'],
            'content' => $data['content'],
            'status' => $data['status'], // Default to active
            'custom_time' => $data['custom_time'],
            'is_hidden' => $data['is_hidden'] ?? 0
        ];

        return $this->repository->update($new_data, (int) $id);
    }

    /**
     * Delete a record
     *
     * @param mixed $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->repository->delete((int) $id);
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
}
