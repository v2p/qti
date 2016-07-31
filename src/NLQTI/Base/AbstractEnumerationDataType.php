<?php

namespace NLQTI\Base;

use NLQTI\Exception\Base\AbstractDataType\CastToDataTypeException;

abstract class AbstractEnumerationDataType extends AbstractDataType
{
    /**
     * @return array
     */
    abstract protected function getPossibleValues();

    /**
     * @param mixed $value
     *
     * @throws CastToDataTypeException
     * @return bool
     */
    protected function castToType($value)
    {
        if (!in_array($value, $this->getPossibleValues())) {
            throw new CastToDataTypeException("Unsuccessful cast of {$value} to the data type " . get_class());
        }

        return $value;
    }
}
