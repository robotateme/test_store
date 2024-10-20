<?php

namespace Source\Infrastructure\Repositories\Exceptions;

class ResourceNotFoundException extends RepositoryException
{
    protected $message = "Resource not found";
}