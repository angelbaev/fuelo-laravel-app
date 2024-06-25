<?php 
namespace App\DataTransferObjects;


use App\DataTransferObjects\Contracts\ReadableDataTransferObjectInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator;

class FuelDataTransferObject extends ReadableDataTransferObject
{
    public function __construct(
        public readonly ?string $id,
        public readonly string $code,
        public readonly string $name,
        public readonly int $status
    ) {
        $this->validate();
    }


    public static function fromModel($model)
    {
        return new self(
            $model->id,
            $model->code,
            $model->name,
            (int)$model->status
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
                 'code' => $this->code,
                 'status' => $this->status,
             ],
             [
                 'name' => 'required|string|max:255',
                 'code' => 'required|string|max:255',
                 'status' => 'required|integer|in:0,1',
             ]
         );

         if ($validator->fails()) {
             $jsonResponse = response()->json(['errors' => $validator->errors()], 422);

             throw new HttpResponseException($jsonResponse);
         }
     }
}
