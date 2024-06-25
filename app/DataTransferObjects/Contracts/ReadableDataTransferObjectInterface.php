<?php

namespace App\DataTransferObjects\Contracts;

interface ReadableDataTransferObjectInterface extends FromModelInterface, ToArrayInterface, DataTransferObjectAwareInterface
{

}