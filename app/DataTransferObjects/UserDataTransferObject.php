<?php 
namespace App\DataTransferObjects;


use App\DataTransferObjects\Contracts\FromArrayInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator;

class UserDataTransferObject extends ReadableDataTransferObject
{
    public function __construct(
        public readonly ?string $id,
        public readonly string $name,
        public readonly string $email,
        public readonly ?string $password = null,

    ) {
        $this->validate();
    }

    public static function fromModel($model)
    {
        return new self(
            $model->id,
            $model->name,
            $model->email
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
                 'email' => $this->email
             ],
             [
                 'name' => 'required|string|max:255',
                 'email' => 'required|string|max:255',
             ]
         );

         if ($validator->fails()) {
             $jsonResponse = response()->json(['errors' => $validator->errors()], 422);

             throw new HttpResponseException($jsonResponse);
         }
     }
}
