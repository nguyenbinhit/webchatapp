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
}
