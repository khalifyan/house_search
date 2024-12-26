<?php

namespace App\Repository;

use App\DTO\HouseRequestData;
use App\Models\House;
use Illuminate\Database\Eloquent\Collection;

class HouseRepository
{
    public function getHouses(HouseRequestData $data): Collection
    {
        $query = House::query();

        if ($data->name) {
            $query->where('name', 'LIKE', '%' . $data->name . '%');
        }
        if ($data->bedrooms) {
            $query->where('bedrooms', $data->bedrooms);
        }
        if ($data->bathrooms) {
            $query->where('bathrooms', $data->bathrooms);
        }
        if ($data->storeys) {
            $query->where('storeys', $data->storeys);
        }
        if ($data->garages) {
            $query->where('garages', $data->garages);
        }
        if ($data->priceMin && $data->priceMax) {
            $query->whereBetween('price', [$data->priceMin, $data->priceMax]);
        }

        $query->orderBy('id');

        return $query->get();
    }
}
