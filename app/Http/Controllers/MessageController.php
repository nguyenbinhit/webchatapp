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
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\JsonResponse|MessageResource
     */
    public function store(CreateRequest $request)
    {
        try {
            $data = $request->validated();
            $data['is_read'] = 0;

            $message = $this->messageService->create($data);

            return (new MessageResource($message))->additional($this->displayMessageStore());
        } catch (\Exception $e) {
            return $this->internalServerError();
        }
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
     *
     * @param UpdateRequest $request
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse|MessageResource
     */
    public function update(UpdateRequest $request, $id)
    {
        try {
            $data = $request->validated();

            $message = $this->messageService->update($data, (int) $id);

            if (!$message) return $this->notFound();

            return (new MessageResource($message))->additional($this->displayMessageUpdate());
        } catch (\Exception $e) {
            return $this->internalServerError();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        try {
            $this->messageService->delete((int) $id);

            return $this->displayDeleted();
        } catch (\Exception $e) {
            return $this->internalServerError();
        }
    }

    /**
     * List messages by client ID.
     *
     * @param int $id
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function listByClient(Request $request, $id)
    {
        $messages = $this->messageService->getByClient((int) $id);

        return MessageResource::collection($messages)->additional($this->displayMessageSuccess());
    }
}
