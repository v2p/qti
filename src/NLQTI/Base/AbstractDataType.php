<?php
/**
 * Created by JetBrains PhpStorm. 
 * Date: 26.03.13
 * Time: 13:55
 */

namespace NLQTI\Base;

use NLQTI\Exception\WrongValueForDataTypeException;

/**
 * Class AbstractDataType
 *
 * @package NLQTI\Base
 */
abstract class AbstractDataType
{
    /**
     * @var mixed
     */
    private $value;

    /**
     * @param mixed $value
     *
     * @return bool
     */
    abstract protected function isValueValid($value);

    /**
     * @return mixed
     */
    abstract protected function getDefaultValue();

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        if ($this->isValueValid($value)) {
            $this->value = $value;
        } else {
            throw new WrongValueForDataTypeException();
        }
    }

    /**
     * @param mixed $initialValue
     */
    public function __construct($initialValue = null)
    {
        $value = isset($initialValue) ? $initialValue : $this->getDefaultValue();
        $this->setValue($value);
    }
}
