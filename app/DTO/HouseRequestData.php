<?php

declare(strict_types=1);

namespace App\DTO;

class HouseRequestData
{
    public function __construct(
        public string $name,
        public int $priceMin,
        public int $priceMax,
        public int $bedrooms,
        public int $bathrooms,
        public int $storeys,
        public int $garages,
    ) { }
}
