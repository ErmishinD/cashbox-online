<?php

namespace App\Repositories;

use App\Models\Shop;
use App\Models\Storage;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use phpDocumentor\Reflection\Types\Integer;
use function PHPUnit\Framework\isInstanceOf;

/**
 * Class ShopRepository.
 */
class ShopRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Shop::class;
    }

    protected function getByIdOrModel($idOrModel): ?\Illuminate\Database\Eloquent\Model
    {
        if (is_numeric($idOrModel)) {
            return $this->model->find($idOrModel);
        }
        elseif ($idOrModel instanceof $this->model) {
            return $idOrModel;
        }
        return null;
    }

    public function getForSelect() {
        return $this->model->select('id', 'name')->get();
    }

    public function getForShow(int $id)
    {
        return $this->model->with('storages')->find($id);
    }

    public function create(array $data)
    {
        $shop = parent::create($data);
        if (!empty($data['storage_name'])) {
            $storage = Storage::create(['name' => $data['storage_name'], 'shop_id' => $shop->id]);
            $shop->storages = collect([$storage]);
        }
        return $shop;
    }

    public function update($shopOrId, $data) {
        $shop = $this->model->find($shopOrId);
        $shop = $this->getByIdOrModel($shop);
        if (!$shop) {
            return false;
        }

        $shop->update($data);
        if (!empty($data['storage_name'])) {
            $storage = Storage::create(['name' => $data['storage_name'], 'shop_id' => $shop->id]);
            $shop->storages->push($storage);
        }
        return $shop;
    }
}
