<?php declare(strict_types=1);

namespace VojtechRichter\DiContainer;

use Psr\Container\ContainerInterface;
use VojtechRichter\DiContainer\Exceptions\UnregisteredContainerIdentifierException;

final class Container implements ContainerInterface
{
    /** @var array<string, string> $services */
    private array $services = [];

    public function __construct()
    {
    }

    public function set(string $id, string $service): void
    {
        $this->services[$id] = $service;
    }

    public function get(string $id)
    {
        if (!array_key_exists($id, $this->services)) {
            throw new UnregisteredContainerIdentifierException($id);
        }

        return Service::init($this->services[$id]);
    }

    public function has(string $id): bool
    {
        return array_key_exists($id, $this->services);
    }
}