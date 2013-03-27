<?php
/**
 * Created by JetBrains PhpStorm. 
 * Date: 27.03.13
 * Time: 16:32 
 */

namespace NLQTI\DataType;

use NLQTI\Base\AbstractDataType;

class IntDataType extends AbstractDataType
{
    /**
     * @param mixed $value
     *
     * @return bool
     */
    protected function isValueValid($value)
    {
        return is_int($value);
    }

    /**
     * @return mixed
     */
    protected function getDefaultValue()
    {
        return 0;
    }
}