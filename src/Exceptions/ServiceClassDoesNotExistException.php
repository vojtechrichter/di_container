<?php declare(strict_types=1);

namespace VojtechRichter\DiContainer\Exceptions;

use Psr\Container\ContainerExceptionInterface;

final readonly class ServiceClassDoesNotExistException implements ContainerExceptionInterface
{
    public function __construct(private string $class_name)
    {
    }

    public function getMessage(): string
    {
        $msg = "Could not create service '$this->class_name', because the class does not exist";
        return $msg;
    }

    public function getCode(): null
    {
        return null;
    }

    public function getFile(): string
    {
        return __FILE__;
    }

    public function getLine(): int
    {
        return __LINE__;
    }

    public function getTrace(): array
    {
        return debug_backtrace();
    }

    public function getTraceAsString(): string
    {
        return implode("\n", $this->getTrace());
    }

    public function getPrevious(): ?\Throwable
    {
        return null;
    }

    public function __toString(): string
    {
        return $this->getMessage();
    }
}