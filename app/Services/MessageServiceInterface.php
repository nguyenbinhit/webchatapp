<?php

namespace App\Services;

use App\Services\BaseServiceInterface;

interface MessageServiceInterface extends BaseServiceInterface
{
    /**
     * Get messages by client ID
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
