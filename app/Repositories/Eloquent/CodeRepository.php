<?php

namespace App\Repositories\Eloquent;

use App\Models\Code;
use App\Repositories\CodeRepositoryInterface;
use Illuminate\Http\Request;

class CodeRepository extends BaseRepository implements CodeRepositoryInterface
{
    public function getModel()
    {
        return new Code();
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

    /**
     * Get a record by code.
     *
     * @param string $code
     * @return mixed
     */
    public function getByCode(string $code)
    {
        return $this->model->where(['code' => $code])->first();
    }
}
