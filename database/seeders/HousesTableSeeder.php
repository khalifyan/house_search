<?php

namespace Database\Seeders;

use App\Models\House;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvPath = storage_path('app/csv/houses.csv');
        $data = array_map('str_getcsv', file($csvPath));
        $headers = array_shift($data);

        foreach ($data as $row) {
            $houseData = array_combine($headers, $row);

            House::query()->create([
                'name' => $houseData['Name'],
                'price' => (int) $houseData['Price'],
                'bedrooms' => (int) $houseData['Bedrooms'],
                'bathrooms' => (int) $houseData['Bathrooms'],
                'storeys' => (int) $houseData['Storeys'],
                'garages' => (int) $houseData['Garages'],
            ]);
        }
    }
}
