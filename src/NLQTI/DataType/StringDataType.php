<?php
/**
 * Created by JetBrains PhpStorm. 
 * Date: 26.03.13
 * Time: 14:00
 */

namespace NLQTI\DataType;

use NLQTI\Base\AbstractDataType;

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
     * @return bool
     */
    protected function isValueValid($value)
    {
        return is_string($value);
    }

    protected function getDefaultValue()
    {
        return '';
    }
}
