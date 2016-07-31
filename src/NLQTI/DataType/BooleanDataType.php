<?php

namespace NLQTI\DataType;

use NLQTI\Base\AbstractDataType;

class BooleanDataType extends AbstractDataType
{
    /**
     * @param mixed $value
     *
     * @return bool
     */
    protected function castToType($value)
    {
        return filter_var($value, FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * @return mixed
     */
    protected function getDefaultValue()
    {
        return false;
    }
}
