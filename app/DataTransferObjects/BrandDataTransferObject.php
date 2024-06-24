<?php 
namespace App\DataTransferObjects;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator;

class BrandDataTransferObject extends ResourceableDataTransferObject
{
    public function __construct(
        public readonly ?string $id,
        public readonly string $name,
        public readonly string $logo,
        public readonly int $src_id,
        public readonly int $status
    ) {
        $this->validate();
    }

    public static function fromArray( array $data)
    {
        return new self(
            $data['id'] ?? null,
            $data['name'] ?? '',
            $data['logo'] ?? '',
            $data['src_id'] ?? '',
            $data['status'] ?? ''
        );
    }

    public static function fromModel($model)
    {
        return new self(
            $model->id,
            $model->name,
            $model->logo,
            $model->src_id,
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
                 'logo' => $this->logo,
                 'src_id' => $this->src_id,
                 'status' => $this->status,
             ],
             [
                 'name' => 'required|string|max:255',
                 'logo' => 'required|string|max:255',
                 'src_id' => 'required|integer',// unique:brands,src_id
                 'status' => 'required|integer|in:0,1',
             ]
         );

         if ($validator->fails()) {
             $jsonResponse = response()->json(['errors' => $validator->errors()], 422);

             throw new HttpResponseException($jsonResponse);
         }
     }
}
