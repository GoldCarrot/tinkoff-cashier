<?php

namespace Goldcarrot\Cashiers\Tinkoff\Values;

use Goldcarrot\Cashiers\Tinkoff\Interfaces\Arrayable;
use ReflectionClass;

abstract class Value implements Arrayable
{
    public function toArray(): array
    {
        $result = [];

        foreach ((new ReflectionClass($this))->getProperties() as $property) {
            $name = $property->getName();
            $value = $this->$name;

            if ($value !== null) {
                $result[$name] = $value instanceof Arrayable ? $value->toArray() : $value;
            }

            if (is_array($value)) {
                foreach ($value as $key => $item) {
                    $result[$name][$key] = $item instanceof Arrayable ? $value->toArray() : $item;
                }
            }
        }

        return $result;
    }
}