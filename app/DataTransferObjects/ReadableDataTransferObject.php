<?php 
namespace App\DataTransferObjects;

use App\DataTransferObjects\Contracts\ReadableDataTransferObjectInterface;
use App\Models\Contracts\ModelAwareInterface;
use Illuminate\Database\Eloquent\Collection;

abstract class ReadableDataTransferObject extends BaseDataTransferObject implements ReadableDataTransferObjectInterface
{

    public static function fromModel(ModelAwareInterface $model)
    {

    }

    public static function fromCollection(Collection $collection)
    {

    }

     public function validate(): void
     {

     }

}
