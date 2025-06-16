<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManagementMessage\CreateRequest;
use App\Http\Requests\ManagementMessage\UpdateRequest;
use App\Http\Resources\ManagementMessageResource;
use App\Models\ManagementMessage;
use App\Services\ManagementMessageServiceInterface;
use Illuminate\Http\Request;

class ManagementMessageController extends BaseController
{
    /**
     * @var ManagementMessageServiceInterface
     */
    protected $managementMessageService;

    public function __construct(ManagementMessageServiceInterface $managementMessageService)
    {
        $this->managementMessageService = $managementMessageService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function index(Request $request)
    {
        $managementMessages = $this->managementMessageService->getAll($request);

        return ManagementMessageResource::collection($managementMessages)->additional($this->displayMessageSuccess());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\JsonResponse|ManagementMessageResource
     */
    public function store(CreateRequest $request)
    {
        try {
            $data = $request->validated();
            $file = $request->file('image_url');
            if ($file) {
                $hashName = $file->hashName();
                $path = $this->__uploadFile($file, $hashName, 'uploads/images');
                $data['image_url_path'] = $path;
            }

            $managementMessage = $this->managementMessageService->create($data);

            return (new ManagementMessageResource($managementMessage))->additional($this->displayMessageStore());
        } catch (\Exception $e) {
            return $this->internalServerError();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param ManagementMessage $managementMessage
     * @return \Illuminate\Http\JsonResponse|ManagementMessageResource
     */
    public function show(ManagementMessage $managementMessage)
    {
        return (new ManagementMessageResource($managementMessage))->additional($this->displayMessageSuccess());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|ManagementMessageResource
     */
    public function update(UpdateRequest $request, $id)
    {
        try {
            $data = $request->validated();
            $file = $request->file('image_url');
            if ($file) {
                $hashName = $file->hashName();
                $path = $this->__uploadFile($file, $hashName, 'uploads/images');
                $data['image_url_path'] = $path;
            }

            $managementMessage = $this->managementMessageService->update($data, $id);

            return (new ManagementMessageResource($managementMessage))->additional($this->displayMessageUpdate());
        } catch (\Exception $e) {
            return $this->internalServerError();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ManagementMessage $managementMessage
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(ManagementMessage $managementMessage)
    {
        try {
            $managementMessage->delete();

            return $this->displayDeleted();
        } catch (\Exception $e) {
            return $this->internalServerError();
        }
    }
}
