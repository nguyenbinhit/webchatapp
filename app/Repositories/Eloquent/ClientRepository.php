<?php

namespace App\Repositories\Eloquent;

use App\Models\Client;
use App\Repositories\ClientRepositoryInterface;
use Illuminate\Http\Request;

class ClientRepository extends BaseRepository implements ClientRepositoryInterface
{
    public function getModel()
    {
        return new Client();
    }

    /**
     * Login
     *
     * @param array $data
     * @return void|bool|Client
     */
    public function login($data)
    {
        $where = [
            'phone' => $data['phone'],
            'code' => $data['code'],
        ];

        $client = $this->model->where($where)->first();

        if ($client) {
            return $client;
        }

        return false;
    }
}
