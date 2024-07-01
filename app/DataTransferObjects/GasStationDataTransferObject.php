<?php 
namespace App\DataTransferObjects;


use App\DataTransferObjects\Contracts\ReadableDataTransferObjectInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator;

class GasStationDataTransferObject extends ReadableDataTransferObject
{
    public function __construct(
        public readonly ?string $id,
        public readonly int $src_id,
        public readonly int $brand_src_id,
        public readonly string $name,
        public readonly string $city,
        public readonly string $address,
        public readonly float $lat,
        public readonly float $lon,
        public readonly ?BrandDataTransferObject $brand
    ) {
        $this->validate();
    }


    public static function fromModel($model)
    {
        return new self(
            $model->id,
            $model->src_id,
            $model->brand_src_id,
            $model->name,
            $model->city,
            $model->address,
            $model->lat,
            $model->lon,
            $model->brand ? BrandDataTransferObject::fromModel($model->brand) : null
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
                 'name' => $this->name,
                 'src_id' => $this->src_id,
                 'brand_src_id' => $this->brand_src_id,
                 'city' => $this->city,
                 'address' => $this->address,
             ],
             [
                 'name' => 'required|string|max:255',
                 'src_id' => 'required|integer',
                 'brand_src_id' => 'required|integer',
                 'city' => 'required|string|max:255',
                 'address' => 'required|string|max:255',
             ]
         );

         if ($validator->fails()) {
             $jsonResponse = response()->json(['errors' => $validator->errors()], 422);

             throw new HttpResponseException($jsonResponse);
         }
     }
}
