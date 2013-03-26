<?php
/**
 * Created by JetBrains PhpStorm. 
 * Date: 26.03.13
 * Time: 17:17
 */

namespace NLQTI\DataType;

use NLQTI\Base\AbstractDataType;

class BooleanDataType extends AbstractDataType
{
    /**
     * @param mixed $value
     *
     * @return bool
     */
    protected function isValueValid($value)
    {
        return is_bool($value);
    }

    /**
     * @return mixed
     */
    protected function getDefaultValue()
    {
        return false;
    }
}
