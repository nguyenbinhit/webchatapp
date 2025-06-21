<?php

namespace App\Services\Production;

use App\Repositories\Eloquent\MessageRepository;
use App\Repositories\ManagementMessageRepositoryInterface;
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

    protected $repositoryManagementMessage;

    /**
     * Constructor
     *
     * @param MessageRepository $repository
     */
    public function __construct(MessageRepositoryInterface $repository, ManagementMessageRepositoryInterface $repositoryManagementMessage)
    {
        $this->repository = $repository;
        $this->repositoryManagementMessage = $repositoryManagementMessage;
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

    /**
     * Save data for a message
     *
     * @param array $data
     * @return mixed
     */
    public function saveData(array $data): mixed
    {
        $management_message = $this->repositoryManagementMessage->show($data['management_message_id'])?->id ?? null;

        $new_data = [
            'management_message_id' => $management_message,
            'content' => json_encode($data['content']) ?? null,
        ];

        return $this->repository->saveData($new_data);
    }
}
