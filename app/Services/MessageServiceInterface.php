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
}
