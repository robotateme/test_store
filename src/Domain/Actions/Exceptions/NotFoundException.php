<?php

namespace Source\Domain\Actions\Exceptions;

use Source\Domain\Actions\Exceptions\ActionException;

class NotFoundException extends ActionException
{
    protected $message = "Not Found";
}