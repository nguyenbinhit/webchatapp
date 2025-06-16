<?php

namespace App\Repositories\Eloquent;

use App\Repositories\BaseRepositoryInterface;
use Illuminate\Http\Request;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->model = $this->getModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    /**
     * Get all records with pagination.
     *
     * @param Request $request
     * @return mixed
     */
    public function all(Request $request)
    {
        $limit = $request->get('limit', 10);

        $data = $this->model::orderByDesc('id')->paginate($limit);

        return $data;
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id)
    {
        $result = $this->model->find($id);

        if ($result) {
            $result->update($data);

            return $result;
        }

        return false;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        $result = $this->model->find($id);

        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $result = $this->model->find($id);

        if ($result) {
            return $result;
        }

        return false;
    }

    /**
     * @return mixed
     */
    public function count()
    {
        return $this->model->count();
    }
}
