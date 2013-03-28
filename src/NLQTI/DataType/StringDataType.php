<?php
/**
 * Created by JetBrains PhpStorm. 
 * Date: 26.03.13
 * Time: 14:00
 */

namespace NLQTI\DataType;

use NLQTI\Base\AbstractDataType;
use NLQTI\Exception\Base\AbstractDataType\CastToDataTypeException;

/**
 * Class StringDataType
 *
 * @package NLQTI\DataType
 */
class StringDataType extends AbstractDataType
{
    /**
     * @param mixed $value
     *
     * @throws CastToDataTypeException
     * @return string
     */
    protected function castToType($value)
    {
        if (!is_string($value)) {
            throw new CastToDataTypeException("Unsuccessful cast of {$value} to the data type " . get_class());
        }

        return $value;
    }

    protected function getDefaultValue()
    {
        return '';
    }
}
