<?php

namespace App\Repositories;

use App\Repositories\BaseRepositoryInterface;

interface MessageRepositoryInterface extends BaseRepositoryInterface {
    /**
     * Get messages by ID
     *
     * @param int $id
     * @return mixed
     */
    public function getByClient($id);

    /**
     * Save data for a message
     *
     * @param array $data
     * @return mixed
     */
    public function saveData(array $data): mixed;
}
