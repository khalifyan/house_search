<?php

namespace App\Action;

use App\DTO\HouseRequestData;
use App\Repository\HouseRepository;
use Illuminate\Database\Eloquent\Collection;

readonly class HouseSearchAction
{
    public function __construct(
        private HouseRepository $houseRepository
    ) { }

    public function execute(HouseRequestData $data): Collection
    {
        return $this->houseRepository->getHouses($data);
    }
}
