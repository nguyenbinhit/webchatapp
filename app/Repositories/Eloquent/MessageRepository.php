<?php

namespace App\Repositories\Eloquent;

use App\Models\Message;
use App\Repositories\MessageRepositoryInterface;

class MessageRepository extends BaseRepository implements MessageRepositoryInterface
{
    public function getModel()
    {
        return new Message();
    }

    /**
     * Get messages by client ID
     *
     * @param int $id
     * @return mixed
     */
    public function getByClient($id)
    {
        return $this->model->where('management_message_id', $id)->first();
    }

    /**
     * Save data for a message
     *
     * @param array $data
     * @return mixed
     */
    public function saveData(array $data): mixed
    {
        $message = $this->model->updateOrCreate(
            ['management_message_id' => $data['management_message_id']],
            ['content' => $data['content']]
        );

        return $message;
    }
}
