<?php declare(strict_types=1);

namespace VojtechRichter\DiContainer;

use Psr\Container\ContainerInterface;
use VojtechRichter\DiContainer\Exceptions\ServiceClassDoesNotExistException;
use VojtechRichter\DiContainer\Exceptions\UnregisteredContainerIdentifierException;

final class Container implements ContainerInterface
{
    /** @var array<string, callable> $services */
    private array $services = [];
    private bool $autowiring_enabled = false;

    public function __construct()
    {
    }

    public function set(string $id, callable $service): void
    {
        $this->services[$id] = $service;
    }

    public function enableAutowiring(): void
    {
        $this->autowiring_enabled = true;
    }

    public function get(string $id): mixed
    {
        if (!array_key_exists($id, $this->services)) {
//            if ($this->autowiring_enabled) {
//                if (class_exists($id)) {
//
//                }
//                throw new ServiceClassDoesNotExistException($id);
//            }
            throw new UnregisteredContainerIdentifierException($id);
        }

        return call_user_func($this->services[$id]);
    }

    public function has(string $id): bool
    {
        return array_key_exists($id, $this->services);
    }
}