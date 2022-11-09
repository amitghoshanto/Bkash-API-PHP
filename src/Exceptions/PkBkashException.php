<?php
namespace App\Exceptions;

use Throwable;

class PkBkashException extends \Exception
{
    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct("Bkash: $message", $code, $previous);
    }

}