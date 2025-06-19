<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingContact\CreateRequest;
use App\Http\Resources\SettingContactResource;
use App\Models\SettingContact;
use App\Services\SettingContactServiceInterface;
use Illuminate\Http\Request;

class SettingContactController extends BaseController
{
    /**
     * @var
     */
    protected $settingContactService;

    public function __construct(SettingContactServiceInterface $settingContactService)
    {
        $this->settingContactService = $settingContactService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $settingContact = SettingContact::first();

            if (!$settingContact) return $this->notFound();

            return (new SettingContactResource($settingContact))->additional($this->displayMessageSuccess());
        } catch (\Exception $e) {
            return $this->internalServerError();
        }
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
     *
     * @return \Illuminate\Http\JsonResponse|SettingContactResource
     */
    public function show()
    {
        try {
            $settingContact = SettingContact::first();

            if (!$settingContact) return $this->notFound();

            return (new SettingContactResource($settingContact))->additional($this->displayMessageSuccess());
        } catch (\Exception $e) {
            return $this->internalServerError();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SettingContact $settingContact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SettingContact $settingContact)
    {
        //
    }

    /**
     * Save data for setting contact.
     *
     * @param CreateRequest $request
     * @return \Illuminate\Http\JsonResponse|SettingContactResource
     */
    public function saveData(CreateRequest $request)
    {
        try {
            $data = $request->validated();
            $data['id'] = $request->get('id', null);
            $file = $request->file('file');
            if ($file) {
                $hashName = $file->hashName();
                $path = $this->__uploadFile($file, $hashName, 'uploads/images');
                $data['image_url'] = $path;
            }

            $settingContact = $this->settingContactService->saveData($data);

            if (!$settingContact) return $this->notFound();

            return (new SettingContactResource($settingContact))->additional($this->displayMessageUpdate());
        } catch (\Exception $e) {
            return $this->internalServerError();
        }
    }

    /**
     * Check if the code exists.
     *
     * @param mixed $code
     * @return \Illuminate\Http\JsonResponse|SettingContactResource
     */
    public function checkCode(mixed $code)
    {
        $setting_contact = $this->settingContactService->checkCode($code);

        if (!$setting_contact) return $this->notFound();

        return (new SettingContactResource($setting_contact))->additional($this->displayMessageSuccess());
    }
}
