<?php
/**
 * Created by JetBrains PhpStorm. 
 * Date: 26.03.13
 * Time: 17:29
 */

namespace NLQTI\DataType;

use NLQTI\Base\AbstractDataType;
use NLQTI\Exception\Base\AbstractDataType\CastToDataTypeException;

/**
 * Class UriDataType
 *
 * @package NLQTI\DataType
 */
class UriDataType extends AbstractDataType
{
    /**
     * @param mixed $value
     *
     * @throws CastToDataTypeException
     * @return bool
     */
    protected function castToType($value)
    {
        if (!is_string($value)) {
            throw new CastToDataTypeException("Unsuccessful cast of {$value} to the data type " . get_class());
        }

        return $value;
    }

    /**
     * @return mixed
     */
    protected function getDefaultValue()
    {
        return '';
    }
}
