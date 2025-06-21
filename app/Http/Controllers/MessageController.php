<?php

namespace App\Http\Controllers;

use App\Http\Requests\Message\CreateRequest;
use App\Http\Requests\Message\UpdateRequest;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use App\Services\MessageServiceInterface;
use Illuminate\Http\Request;

class MessageController extends BaseController
{
    /**
     * @var MessageServiceInterface
     */
    protected $messageService;

    public function __construct(MessageServiceInterface $messageService)
    {
        $this->messageService = $messageService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }

    /**
     * List messages by client ID.
     *
     * @param int $id
     * @return \Illuminate\Http\Resources\Json\JsonResource| \Illuminate\Http\JsonResponse
     */
    public function listByClient(Request $request, $id)
    {
        $message = $this->messageService->getByClient((int) $id);
        if (!$message) return $this->noData();

        return (new MessageResource($message))->additional($this->displayMessageStore());
    }

    /**
     * Save data for the message.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\JsonResponse|MessageResource
     */
    public function saveData(CreateRequest $request)
    {
        try {
            $data = $request->validated();

            $message = $this->messageService->saveData($data);

            return (new MessageResource($message))->additional($this->displayMessageStore());
        } catch (\Exception $e) {
            return $this->internalServerError();
        }
    }
}
