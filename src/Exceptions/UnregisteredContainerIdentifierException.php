<?php declare(strict_types=1);

namespace VojtechRichter\DiContainer\Exceptions;

use Psr\Container\NotFoundExceptionInterface;

final readonly class UnregisteredContainerIdentifierException implements NotFoundExceptionInterface
{
    public function __construct(
        private string $identifier
    )
    {
    }

    public function getMessage(): string
    {
        $msg = " '$this->identifier' service is not registered in the container.";
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