<?php
/**
 * Created by JetBrains PhpStorm. 
 * Date: 26.03.13
 * Time: 17:29
 */

namespace NLQTI\DataType;

use NLQTI\Base\AbstractDataType;

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
     * @return bool
     */
    protected function isValueValid($value)
    {
        return is_string ($value);
    }

    /**
     * @return mixed
     */
    protected function getDefaultValue()
    {
        return '';
    }
}
