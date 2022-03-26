<?php

namespace App\Repositories;

use App\Models\SellProductGroup;
use App\Services\UploadFileService;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;

/**
 * Class SellProductGroupRepository.
 */
class SellProductGroupRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return SellProductGroup::class;
    }

    public function create(array $data)
    {
        if (array_key_exists('photo', $data)) {
            $photo = $data['photo'];
            unset($data['photo']);
        }

        $sell_product_group = parent::create($data);
        if (!empty($data['sell_products'])) {
            $sell_product_group->sell_products()->attach($data['sell_products']);
        }
        if (!empty($photo)) {
            UploadFileService::save_photo($photo, $sell_product_group);
        }
        return $sell_product_group;
    }

    public function update($sell_product_group, $data)
    {
        if (array_key_exists('photo', $data)) {
            if (!empty($data['photo'])) {
                UploadFileService::save_photo($data['photo'], $sell_product_group);
            }
            unset($data['photo']);
        }

        $sell_product_group->update($data);

        if (!empty($data['sell_products'])) {
            $sell_product_group->sell_products()->sync($data['sell_products']);
        }
        return $sell_product_group;
    }
}
