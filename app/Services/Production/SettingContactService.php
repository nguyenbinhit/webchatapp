<?php

namespace App\Services\Production;

use App\Repositories\CodeRepositoryInterface;
use App\Repositories\Eloquent\SettingContactRepository;
use App\Repositories\SettingContactRepositoryInterface;
use App\Services\SettingContactServiceInterface;
use Illuminate\Http\Request;

class SettingContactService extends BaseService implements SettingContactServiceInterface
{
    /**
     * Parameter
     *
     * @var SettingContactRepository
     */
    protected $repository;

    /**
     * Code Repository
     *
     * @var CodeRepositoryInterface
     */
    protected $codeRepository;

    /**
     * Constructor
     *
     * @param SettingContactRepositoryInterface $repository
     */
    public function __construct(SettingContactRepositoryInterface $repository, CodeRepositoryInterface $codeRepository)
    {
        $this->repository = $repository;
        $this->codeRepository = $codeRepository;
    }

    /**
     * Save data
     *
     * @param array $data
     * @return mixed
     */
    public function saveData(array $data): mixed
    {
        $code = !empty($data['code']) ? $this->codeRepository->getByCode($data['code']) : null;

        $data_setting_contact = [
            'title' => $data['title'],
            'phone' => $data['phone'],
            'image_url' => $data['image_url'] ?? null,
            'main_account' => $data['main_account'] ?? null,
            'code' => $data['code'] ?? null,
            'code_id' => $code ? $code->id : null,
            'description' => $data['description'] ?? null,
            'key_word' => $data['key_word'] ?? null,
        ];

        if (isset($data['id']) && $data['id']) {
            $setting_contact = $this->repository->update($data_setting_contact, $data['id']);

            if (!$setting_contact) $setting_contact = $this->repository->create($data_setting_contact);
        } else {
            $setting_contact = $this->repository->create($data_setting_contact);
        }

        return $setting_contact;
    }
}
