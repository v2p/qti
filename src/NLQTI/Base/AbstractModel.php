<?php
/**
 * Created by JetBrains PhpStorm. 
 * Date: 26.03.13
 * Time: 11:51
 */

namespace NLQTI\Base;

use NLQTI\Exception\AttributeNotFoundException;
use NLQTI\Exception\DataTypeMustBeSpecifiedException;
use NLQTI\Exception\WrongTypeOfChildItemException;

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
     * @var array
     */
    private $children;

    /**
     * @return array
     */
    abstract protected function bindAttributesToTypes();

    /**
     * @return array
     */
    abstract protected function getChildrenConfiguration();

    /**
     * @param string $name
     *
     * @return bool
     */
    private function isAttributeExists($name)
    {
        return isset($this->attributes[$name]);
    }

    /**
     * @param $name
     *
     * @throws DataTypeMustBeSpecifiedException
     * @throws AttributeNotFoundException
     * @return AbstractDataType
     */
    private function getAttribute($name)
    {
        if (!$this->isAttributeExists($name)) {
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

    /**
     * @return AbstractDataType[]
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param string $type
     *
     * @return bool
     */
    private function isChildrenOfTypeExists($type)
    {
        return isset($this->children[$type]);
    }

    /**
     * @param $object
     *
     * @throws WrongTypeOfChildItemException
     */
    private function addChild($object)
    {
        if (!$object instanceof AbstractModel) {
            throw new WrongTypeOfChildItemException();
        }

        $className = get_class($object);

        if (!$this->isChildrenOfTypeExists($className)) {
            $this->children[$className] = array();
        }

        $this->children[] = $object;
    }

    /**
     * @param string $type
     *
     * @return AbstractModel[]
     */
    protected function getChildrenOfType($type)
    {
        if ($this->isChildrenOfTypeExists($type)) {
            return array();
        }

        return $this->children[$type];
    }

    public function getChildren()
    {
        return $this->children;
    }
}
