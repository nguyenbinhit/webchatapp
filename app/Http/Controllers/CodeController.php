<?php

namespace App\Http\Controllers;

use App\Http\Requests\Code\CreateRequest;
use App\Http\Requests\Code\UpdateRequest;
use App\Http\Resources\CodeResource;
use App\Models\Code;
use App\Services\CodeServiceInterface;
use Illuminate\Http\Request;

class CodeController extends BaseController
{
    /**
     * @var CodeServiceInterface
     */
    protected $codeService;

    public function __construct(CodeServiceInterface $codeService)
    {
        $this->codeService = $codeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\JsonResource
     */
    public function index(Request $request)
    {
        $codes = $this->codeService->getAll($request);

        return CodeResource::collection($codes)->additional($this->displayMessageSuccess());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\JsonResponse|CodeResource
     */
    public function store(CreateRequest $request)
    {
        try {
            $data = $request->validated();

            $code = $this->codeService->create($data);

            return (new CodeResource($code))->additional($this->displayMessageStore());
        } catch (\Exception $e) {
            return $this->internalServerError();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Code $code
     * @return \Illuminate\Http\JsonResponse|CodeResource
     */
    public function show(Code $code)
    {
        try {
            return (new CodeResource($code))->additional($this->displayMessageSuccess());
        } catch (\Exception $e) {
            return $this->internalServerError();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse|CodeResource
     */
    public function update(UpdateRequest $request, mixed $id)
    {
        try {
            $data = $request->validated();

            $code = $this->codeService->update($data, $id);

            if (!$code) return $this->notFound();

            return (new CodeResource($code))->additional($this->displayMessageUpdate());
        } catch (\Exception $e) {
            return $this->internalServerError();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Code $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Code $code)
    {
        try {
            $code->delete();

            return $this->displayDeleted();
        } catch (\Exception $e) {
            return $this->internalServerError();
        }
    }
}
