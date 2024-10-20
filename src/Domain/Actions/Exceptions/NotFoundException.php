<?php

namespace Src\Domain\Actions\Exceptions;

use Src\Domain\Actions\Exceptions\ActionException;

class NotFoundException extends ActionException
{
    protected $message = "Not Found";
}