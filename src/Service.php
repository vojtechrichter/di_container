<?php declare(strict_types=1);

namespace VojtechRichter\DiContainer;

use VojtechRichter\DiContainer\Exceptions\ServiceClassDoesNotExistException;

final class Service
{
    /**
     * @throws ServiceClassDoesNotExistException
     */
    public static function init(string $class_name)
    {
        if (class_exists($class_name)) {
            return new $class_name();
        } else {
            throw new ServiceClassDoesNotExistException($class_name);
        }
    }
}