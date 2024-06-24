<?php

namespace App\DataTransferObjects\Contracts;

interface ResourceableDataTransferObjectInterface extends FromArrayInterface, FromModelInterface, ToArrayInterface, ValidatableInterface, DataTransferObjectAwareInterface
{

}