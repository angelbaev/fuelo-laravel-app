<?php 
namespace App\DataTransferObjects;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator;

class FuelPriceDataTransferObject extends ResourceableDataTransferObject
{
    public function __construct(
        public readonly ?string $id,
        public readonly float $price,
        public readonly string $date,
        public readonly ?FuelDataTransferObject $fuel,
        public readonly ?DimensionDataTransferObject $dimension
    ) {
        $this->validate();
    }

    public static function fromArray( array $data)
    {
        return new self(
            $data['id'] ?? null,
            $data['price'] ?? '',
            $data['date'] ?? '',
            $data['fuel'] ?? null,
            $data['dimension'] ?? null
        );
    }

    public static function fromModel($model)
    {
        return new self(
            $model->id,
            $model->price,
            $model->date,
            $model->fuel ? FuelDataTransferObject::fromModel($model->fuel) : null,
            $model->dimension ? DimensionDataTransferObject::fromModel($model->dimension) : null
        );
    }

    public static function fromCollection(Collection $collection)
    {
        return $collection->map(fn($model) => self::fromModel($model));
        }

    public function validate(): void
    {
        $validator = Validator::make(
            [
                'price' => $this->price,
                'date' => $this->date,
            ],
            [
                'price' => 'required|numeric',
                'date' => 'required|string|max:255',
            ]
        );

        if ($validator->fails()) {
            $jsonResponse = response()->json(['errors' => $validator->errors()], 422);

            throw new HttpResponseException($jsonResponse);
        }
    }
}
