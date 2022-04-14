<?php

namespace App\Repositories;

use App\Events\StorageCreated;
use App\Models\Shop;
use App\Models\Storage;
use Illuminate\Support\Facades\Auth;
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

    public function getForSelect(int $company_id) {
        return $this->model->select('id', 'name')->where('company_id', $company_id)->get();
    }

    public function getForShow(int $id)
    {
        return $this->model->with('storages')->find($id);
    }

    public function create(array $data)
    {
        $shop = parent::create($data);
        if (!empty($data['storage_names'])) {
            $storages = collect();
            foreach ($data['storage_names'] as $storage_name) {
                $storage = Storage::create([
                    'name' => $storage_name,
                    'shop_id' => $shop->id,
                    'company_id' => $shop->company_id
                ]);
                $storages->push($storage);
                StorageCreated::dispatch($storage, Auth::user());
            }
            $shop->storages = $storages;
        }
        return $shop;
    }

    public function update($shopOrId, $data) {
        $shop = $this->getByIdOrModel($shopOrId);
        if (!$shop) {
            return false;
        }

        $shop->update($data);
        if (!empty($data['storage_names'])) {
            $storages = collect();
            foreach ($data['storage_names'] as $storage_name) {
                $storage = Storage::create([
                    'name' => $storage_name,
                    'shop_id' => $shop->id,
                    'company_id' => $shop->company_id
                ]);
                StorageCreated::dispatch($storage, Auth::user());
                $storages->push($storage);
            }
            $shop->storages->concat($storages);
        }
        return $shop;
    }
}
