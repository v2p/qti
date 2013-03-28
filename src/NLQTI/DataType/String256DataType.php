<?php
/**
 * Created by JetBrains PhpStorm. 
 * Date: 26.03.13
 * Time: 15:46
 */

namespace NLQTI\DataType;

use NLQTI\Exception\Base\AbstractDataType\CastToDataTypeException;

/**
 * Class StringDataType
 *
 * @package NLQTI\DataType
 */
class String256DataType extends StringDataType
{
    /**
     * @param mixed $value
     *
     * @throws CastToDataTypeException
     * @return string
     */
    protected function castToType($value)
    {
        $parentValue = parent::castToType($value);

        $length = mb_strlen($parentValue);

        if ($length >= 256) {
            throw new CastToDataTypeException("Unsuccessful cast of {$parentValue} to the data type " . get_class());
        }

        return $parentValue;
    }
}
