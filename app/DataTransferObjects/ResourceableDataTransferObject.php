<?php 
namespace App\DataTransferObjects;

use App\DataTransferObjects\Contracts\ResourceableDataTransferObjectInterface;
use App\Models\Contracts\ModelAwareInterface;
use Illuminate\Database\Eloquent\Collection;

abstract class ResourceableDataTransferObject extends BaseDataTransferObject implements ResourceableDataTransferObjectInterface
{

    public static function fromArray( array $data)
    {

    }

    public static function fromModel(ModelAwareInterface $model)
    {

    }

    public static function fromCollection(Collection $collection)
    {
        //return $products->map(fn($p) => self::fromModel($p));
    }

     public function validate(): void
     {

     }

}
