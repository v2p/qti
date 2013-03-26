<?php
/**
 * Created by JetBrains PhpStorm. 
 * Date: 26.03.13
 * Time: 11:51
 */

namespace NLQTI\Base;

use NLQTI\Exception\AttributeNotFoundException;
use NLQTI\Exception\DataTypeMustBeSpecifiedException;

/**
 * Class AbstractModel
 *
 * @package NLQTI\Base
 */
abstract class AbstractModel
{
    /**
     * @var AbstractDataType[]
     */
    private $attributes;

    /**
     * @var AbstractModel[]
     */
    private $children;

    /**
     * @return array
     */
    abstract protected function bindAttributesToTypes();

    /**
     * @param $name
     *
     * @throws DataTypeMustBeSpecifiedException
     * @throws AttributeNotFoundException
     * @return AbstractDataType
     */
    private function getAttribute($name)
    {
        if (!isset($this->attributes[$name])) {
            throw new AttributeNotFoundException();
        }

        $dataType = $this->attributes[$name];

        if (!$dataType instanceof AbstractDataType) {
            throw new DataTypeMustBeSpecifiedException();
        }

        return $dataType;
    }

    /**
     * @param $name
     * @param $value
     *
     * @throws \Exception
     */
    private function setAttributeValue($name, $value)
    {
        $this->getAttribute($name)->setValue($value);
    }

    /**
     * @param $name
     *
     * @return mixed
     */
    private function getAttributeValue($name)
    {
        return $this->getAttribute($name)->getValue();
    }

    public function __construct()
    {
        $this->attributes = $this->bindAttributesToTypes();
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        return $this->getAttributeValue($name);
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        $this->setAttributeValue($name, $value);
    }
}
