<?php
namespace App\Http\Requests;

use App\DTO\HouseRequestData;
use Illuminate\Foundation\Http\FormRequest;

class HouseRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'nullable|string',
            'price_min' => 'nullable|integer',
            'price_max' => 'nullable|integer',
            'bedrooms' => 'nullable|integer',
            'bathrooms' => 'nullable|integer',
            'storeys' => 'nullable|integer',
            'garages' => 'nullable|integer',
        ];
    }

    public function dto(): HouseRequestData
    {
        return new HouseRequestData(
            $this->input('name'),
            (int) $this->input('price_min'),
            (int) $this->input('price_max'),
            (int) $this->input('bedrooms'),
            (int) $this->input('bathrooms'),
            (int) $this->input('storeys'),
            (int) $this->input('garages'),
        );
    }
}
