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
        return $this->model->where(function ($query) use ($id) {
            $query->where([
                ['sender_id', '=', $id],
                ['receiver_id', '=', 0]
            ])->orWhere([
                ['sender_id', '=', 0],
                ['receiver_id', '=', $id]
            ]);
        })
            ->orderByDesc('id')
            ->get();
    }
}
