<?php
namespace App\Models;

use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * @property-read int $id
 *
 * @property string $name
 * @property int $price
 * @property int $bathrooms
 * @property int $bedrooms
 * @property int $storeys
 * @property int $garages
 *
 * @property null|CarbonInterface $created_at
 * @property null|CarbonInterface $updated_at
 */
class House extends Model
{
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'price',
        'bedrooms',
        'bathrooms',
        'storeys',
        'garages',
    ];
}
