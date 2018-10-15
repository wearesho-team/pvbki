<?php

namespace Wearesho\Pvbki;

/**
 * Class Element
 * @package Wearesho\Pvbki
 */
abstract class Element implements ElementInterface
{
    public function __construct(array $config = [])
    {
        $this->configure($config);
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function __get(string $name)
    {
        return $this->$name;
    }

    /**
     * @param string $name
     * @param mixed  $value
     */
    public function __set(string $name, $value)
    {
        if ($this->$name !== null) {
            throw new \InvalidArgumentException("Property [{$name}] already set");
        }

        $this->$name = $value;
    }

    public function configure(array $config = []): void
    {
        foreach ($config as $property => $value) {
            $this->$property = $value;
        }
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }

    public static function translators(): array
    {
        return [];
    }
}
