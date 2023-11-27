<?php

declare(strict_types=1);

namespace App\Core\Exceptions;

interface ExceptionInterface extends \Throwable
{
    /**
     * Get internal error code.
     */
    public function getErrorCode(): string;
}
