<?php

namespace Wearesho\Pvbki;

/**
 * Class BaseCollection
 * @package Wearesho\Pvbki
 */
abstract class BaseCollection extends \ArrayObject implements \JsonSerializable
{
    /**
     * @param array  $elements
     * @param int    $flags
     * @param string $iteratorClass
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(
        array $elements = [],
        int $flags = 0,
        string $iteratorClass = \ArrayIterator::class
    ) {
        foreach ($elements as $element) {
            $this->instanceOfType($element);
        }

        parent::__construct($elements, $flags, $iteratorClass);
    }

    /**
     * @param mixed $value
     *
     * @return BaseCollection|static
     * @throws \InvalidArgumentException
     */
    public function append($value): BaseCollection
    {
        $this->instanceOfType($value);

        parent::append($value);

        return $this;
    }

    /**
     * @param mixed $index
     * @param mixed $value
     *
     * @throws \InvalidArgumentException
     */
    public function offsetSet($index, $value): void
    {
        $this->instanceOfType($value);

        parent::offsetSet($index, $value);
    }

    public function jsonSerialize(): array
    {
        return (array)$this;
    }

    /**
     * Override to customize type of your collection.
     * Must return existed class name
     *
     * @return string
     */
    abstract public function type(): string;

    /**
     * @param mixed $object
     *
     * @throws \InvalidArgumentException
     */
    protected function instanceOfType($object): void
    {
        $needType = $this->type();
        $objectType = get_class($object);

        if (!$object instanceof $needType) {
            throw new \InvalidArgumentException("Element {$objectType} must be instance of " . $needType);
        }
    }
}
