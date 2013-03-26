<?php
/**
 * Created by JetBrains PhpStorm. 
 * Date: 26.03.13
 * Time: 15:46
 */

namespace NLQTI\DataType;

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
     * @return bool
     */
    protected function isValueValid($value)
    {
        if (!parent::isValueValid($value)) {
            return false;
        }

        return mb_strlen($value) <= 256;
    }
}
