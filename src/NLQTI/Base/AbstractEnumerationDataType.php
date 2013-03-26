<?php
/**
 * Created by JetBrains PhpStorm. 
 * Date: 26.03.13
 * Time: 16:37
 */

namespace NLQTI\Base;

abstract class AbstractEnumerationDataType extends AbstractDataType
{
    /**
     * @return array
     */
    abstract protected function getPossibleValues();

    /**
     * @param mixed $value
     *
     * @return bool
     */
    protected function isValueValid($value)
    {
        return in_array($value, $this->getPossibleValues());
    }
}
