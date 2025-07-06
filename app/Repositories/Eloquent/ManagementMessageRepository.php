<?php

namespace App\Repositories\Eloquent;

use App\Models\ManagementMessage;
use App\Repositories\ManagementMessageRepositoryInterface;
use Illuminate\Http\Request;

class ManagementMessageRepository extends BaseRepository implements ManagementMessageRepositoryInterface
{
    public function getModel()
    {
        return new ManagementMessage();
    }

    /**
     * Get all records with pagination.
     *
     * @param Request $request
     * @return mixed
     */
    public function getAll(Request $request)
    {
        $limit = $request->get('limit', 10);

        $clients = $this->model->orderByDesc('id')->paginate($limit);

        return $clients;
    }

    /**
     * Create a new record.
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }
}
