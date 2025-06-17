<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\LoginRequest;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use App\Services\ClientServiceInterface;
use Illuminate\Http\Request;

class ClientController extends BaseController
{
    /**
     * @var ClientServiceInterface
     */
    protected $clientService;

    public function __construct(ClientServiceInterface $clientService)
    {
        $this->clientService = $clientService;
    }

    /**
     * Handle the incoming request for client login.
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse|\App\Models\Client
     */
    public function login(LoginRequest $request)
    {
        try {
            $data = $request->validated();

            $client = $this->clientService->login($data);

            if (!$client) return $this->userNotFound();

            return $client;
        } catch (\Exception $e) {
            return $this->internalServerError();
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $clients = $this->clientService->getAll($request);

        return ClientResource::collection($clients)->additional($this->displayMessageSuccess());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $this->clientService->delete((int)$id);
            return $this->displayDeleted();
        } catch (\Exception $e) {
            return $this->internalServerError();
        }
    }
}
