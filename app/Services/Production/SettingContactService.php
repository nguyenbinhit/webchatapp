<?php

namespace App\Services\Production;

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
     * Constructor
     *
     * @param SettingContactRepositoryInterface $repository
     */
    public function __construct(SettingContactRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Save data
     *
     * @param array $data
     * @return mixed
     */
    public function saveData(array $data): mixed
    {
        $data_setting_contact = [
            'title' => $data['title'],
            'phone' => $data['phone'],
            'redirect_url' => $data['redirect_url'] ?? null,
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
