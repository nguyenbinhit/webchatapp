<?php

namespace App\Services\Production;

use App\Repositories\Eloquent\MessageRepository;
use App\Repositories\MessageRepositoryInterface;
use App\Services\MessageServiceInterface;

class MessageService extends BaseService implements MessageServiceInterface
{
    /**
     * Parameter
     *
     * @var MessageRepository
     */
    protected $repository;

    /**
     * Constructor
     *
     * @param MessageRepository $repository
     */
    public function __construct(MessageRepositoryInterface $repository)
    {
        $this->repository = $repository;
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
            'sender_id' => $data['sender_id'],
            'receiver_id' => $data['receiver_id'],
            'content' => $data['content'] ?? null,
            'custom_time' => $data['custom_time'] ?? null,
            'is_read' => 0, // Default value for is_read
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
            'sender_id' => $data['sender_id'] ?? null,
            'receiver_id' => $data['receiver_id'] ?? null,
            'content' => $data['content'] ?? null,
            'custom_time' => $data['custom_time'] ?? null,
            'is_read' => isset($data['is_read']) ? (int) $data['is_read'] : 0,
        ];

        $code = $this->repository->update($update_data, $id);

        return $code ?: false;
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
     * Get data by ID
     *
     * @param mixed $id
     * @return mixed
     */
    public function getByClient($id)
    {
        return $this->repository->getByClient((int) $id);
    }
}
