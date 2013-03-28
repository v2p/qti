<?php
/**
 * Created by JetBrains PhpStorm. 
 * Date: 27.03.13
 * Time: 16:32 
 */

namespace NLQTI\DataType;

use NLQTI\Base\AbstractDataType;
use NLQTI\Exception\Base\AbstractDataType\CastToDataTypeException;

class IntDataType extends AbstractDataType
{
    /**
     * @param mixed $value
     *
     * @throws CastToDataTypeException
     * @return int
     */
    protected function castToType($value)
    {
        if (!is_numeric($value)) {
            throw new CastToDataTypeException("Unsuccessful cast of {$value} to the data type " . get_class());
        }

        return intval($value);
    }

    /**
     * @return mixed
     */
    protected function getDefaultValue()
    {
        return 0;
    }
}