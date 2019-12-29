<?php

declare(strict_types=1);

namespace League\Flysystem;

use RuntimeException;

class UnableToReadFile extends RuntimeException implements FilesystemOperationFailed
{
    private $location = '';

    /**
     * @var string
     */
    private $reason;

    public static function fromLocation(string $location, string $reason = '')
    {
        $e = new static(rtrim("Unable to write file at location: {$location}. {$reason}"));
        $e->location = $location;
        $e->reason = $reason;

        return $e;
    }

    public function operation(): string
    {
        return FilesystemOperationFailed::OPERATION_READ;
    }

    public function reason(): string
    {
        return $this->reason;
    }

    public function location(): string
    {
        return $this->location;
    }
}