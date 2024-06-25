<?php 
namespace App\DataTransferObjects;


use App\DataTransferObjects\Contracts\FromArrayInterface;


class AuthDataTransferObject extends BaseDataTransferObject implements FromArrayInterface
{
    public function __construct(
        public readonly string $access_token,
        public readonly string $token_type,
        public readonly int $expires_in,
        public readonly UserDataTransferObject $user,
    ) {

    }


    public static function fromArray(array $data)
    {
        return new self(
            $data['access_token'] ?? null,
            $data['token_type'] ?? null,
            $data['expires_in'] ?? null,
            $data['user'] ?? null
        );
    }
}
