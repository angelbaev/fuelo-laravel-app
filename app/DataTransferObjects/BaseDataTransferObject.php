<?php 
namespace App\DataTransferObjects;

use App\DataTransferObjects\Contracts\DataTransferObjectAwareInterface;
use App\DataTransferObjects\Contracts\FromArrayInterface;
use App\DataTransferObjects\Contracts\FromModelInterface;
use App\DataTransferObjects\Contracts\ToArrayInterface;
use App\Models\Contracts\ModelAwareInterface;
//use App\DataTransferObjects\Contracts\{DataTransferObjectInterface,FromRequestInterface,FromModelInterface,ToArrayInterface,ValidatableInterface};
//use App\Http\Requests\BrandRequest;
//use Illuminate\Validation\ValidationException;
//use Illuminate\Support\Facades\Validator;

// https://www.youtube.com/watch?v=5qOwF-J5xxM&ab_channel=Przemys%C5%82awPrzy%C5%82ucki
// https://medium.com/@mohammad.roshandelpoor/dto-data-transfer-objects-in-laravel-6b391e1c2c29
// https://dev.to/emrancu/data-transfer-object-dto-in-laravel-5apa
// https://martinjoo.dev/how-to-use-data-transfer-objects-and-actions-in-laravel
abstract class BaseDataTransferObject implements DataTransferObjectAwareInterface, ToArrayInterface
{
    public function toArray(): array
    {
       return get_object_vars($this);
    }

    public function toStoreArray(): array
    {
        $array = get_object_vars($this);

        foreach ($array as $key => $value) {
            if (is_object($value) && method_exists($value, 'toArray')) {
                $array["{$key}_id"] = $value->id;
                unset($array[$key]);
            }
        }

        return $array;
    }


}
// https://medium.com/@sliusarchyn/value-objects-in-laravel-use-it-12ba71b00281
// https://dev.to/bdelespierre/using-value-objects-in-laravel-models-44la
// https://youtu.be/3icS3sSbaOY