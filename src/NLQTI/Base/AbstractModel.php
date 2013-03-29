<?php
/**
 * Created by JetBrains PhpStorm. 
 * Date: 26.03.13
 * Time: 11:51
 */

namespace NLQTI\Base;

use NLQTI\Exception\Base\AbstractModel\PropertyIsNotSupportedException;
use NLQTI\Exception\Base\AbstractModel\WrongDataTypeSpecifiedException;
use NLQTI\Exception\Base\AbstractModel\WrongTypeOfChildItemException;
use Tools\Config;

/**
 * Class AbstractModel
 *
 * @package NLQTI\Base
 *
 */
abstract class AbstractModel
{
    /**
     * Multiplicity of the attributes and child entites:
     */
    const SINGLE_MANDATORY = '1'; // 1
    const SINGLE_OPTIONAL = '?'; // 0 or 1
    const MULTIPLE_OPTIONAL = '*'; // 0 or more
    const MULTIPLE_MANDATORY = '+'; // 1 or more

    /**
     * Order of config properties:
     */

    // for an attributes;
    const ATTRIBUTE_DATA_TYPE = 0;
    const ATTRIBUTE_MULTIPLICITY = 1;

    // for a child entites:
    const CHILD_ENTITY_CLASS = 0;
    const CHILD_ENTITY_MULTIPLICITY = 1;

    /**
     * Simple content that stores into element
     *
     * @var mixed
     */
    protected $elementContent;

    /**
     * @var AbstractDataType[]
     */
    private $attributes;

    /**
     * @var array
     */
    private $attributesConfiguration;

    /**
     * @var array
     */
    private $children;

    /**
     * @var array
     */
    private $childrenConfiguration;

    /**
     * @return array
     */
    abstract protected function initAttributesConfiguration();

    /**
     * @return array
     */
    abstract protected function initChildrenConfiguration();

    //region Attributes
    /**
     * @param string $name
     *
     * @return bool
     */
    private function isAttributeSupported($name)
    {
        return isset($this->attributesConfiguration[$name]);
    }

    /**
     * @param string $name
     * @throws PropertyIsNotSupportedException
     *
     * @return array|bool
     */
    private function getAttributeConfiguration($name)
    {
        if (!$this->isAttributeSupported($name)) {
            throw new PropertyIsNotSupportedException();
        }

        return $this->attributesConfiguration[$name];
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    private function isAttributeDefined($name)
    {
        return isset($this->attributes[$name]);
    }

    /**
     * @param string $name
     *
     * @throws WrongDataTypeSpecifiedException
     */
    private function defineAttribute($name)
    {
        $config = $this->getAttributeConfiguration($name);

        /** @var AbstractDataType $dataType */
        $dataType = $config[self::ATTRIBUTE_DATA_TYPE];

        if (!$dataType instanceof AbstractDataType) {
            throw new WrongDataTypeSpecifiedException();
        }

        $this->attributes[$name] = $dataType;
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    private function setAttributeValue($name, $value)
    {
        if (!$this->isAttributeDefined($name)) {
            $this->defineAttribute($name);
        }

        Config::getInstance()->getLogger('AbstractModel')->debug(
            'Successfully set value to the attribute',
            array('class' => get_called_class(), 'name' => $name, 'value' => $value)
        );

        $this->attributes[$name]->setValue($value);
    }

    /**
     * @param string $name
     * @return mixed
     */
    private function getAttributeValue($name)
    {
        if (!$this->isAttributeDefined($name)) {
            $this->defineAttribute($name);
        }

        return $this->attributes[$name]->getValue();
    }
    //endregion

    //region Children
    /**
     * @param string $name
     *
     * @return bool
     */
    private function isChildSupported($name)
    {
        return isset($this->childrenConfiguration[$name]);
    }

    /**
     * @param string $name
     *
     * @throws PropertyIsNotSupportedException
     * @return array
     */
    private function getChildConfiguration($name)
    {
        if (!$this->isChildSupported($name)) {
            throw new PropertyIsNotSupportedException();
        }

        return $this->childrenConfiguration[$name];
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    private function isChildDefined($name)
    {
        return isset($this->children[$name]);
    }

    /**
     * @param string $name
     * @return bool
     */
    private function isChildIsMultiple($name)
    {
        $config = $this->getChildConfiguration($name);
        $entityMultiplicity = $config[self::CHILD_ENTITY_MULTIPLICITY]; //todo: Check whether this option is specified and correct

        return $entityMultiplicity == self::MULTIPLE_OPTIONAL || $entityMultiplicity == self::MULTIPLE_MANDATORY;
    }

    /**
     * @param string $name
     *
     * @throws WrongTypeOfChildItemException
     */
    private function defineChild($name)
    {
        $config = $this->getChildConfiguration($name);
        $entityClassname = $config[self::CHILD_ENTITY_CLASS];

        /** @var AbstractModel $entity */
        $entity = new $entityClassname();

        if (!$entity instanceof AbstractModel) {
            throw new WrongTypeOfChildItemException();
        }

        $this->children[$name] = $this->isChildIsMultiple($name) ? array() : null;
    }

    /**
     * @param string $name
     * @param AbstractModel $value
     *
     * @throws WrongTypeOfChildItemException
     */
    private function setChildValue($name, $value)
    {
        if (!$this->isChildDefined($name)) {
            $this->defineChild($name);
        }

        $config = $this->getChildConfiguration($name);
        $expectedClassname = $config[self::CHILD_ENTITY_CLASS];

        if (get_class($value) !== $expectedClassname) {
            throw new WrongTypeOfChildItemException();
        }

        if ($this->isChildIsMultiple($name)) {
            $this->children[$name][] = $value;
        } else {
            $this->children[$name] = $value;
        }

        Config::getInstance()->getLogger('AbstractModel')->debug(
            'Successfully set value to the child',
            array('class' => get_called_class(), 'name' => $name, 'value' => $value)
        );
    }

    /**
     * @param string $name
     *
     * @return AbstractModel|AbstractModel[]
     */
    private function getChildValue($name)
    {
        if (!$this->isChildDefined($name)) {
            $this->defineChild($name);
        }

        return $this->children[$name];
    }
    //endregion

    /**
     * @return string
     */
    public static function getClass()
    {
        return get_called_class();
    }

    public function __construct()
    {
        $this->attributesConfiguration = $this->initAttributesConfiguration();
        $this->childrenConfiguration = $this->initChildrenConfiguration();
    }

    /**
     * @param string $name
     *
     * @throws PropertyIsNotSupportedException
     * @return mixed
     */
    public function __get($name)
    {
        if ($this->isAttributeSupported($name)) {
            return $this->getAttributeValue($name);

        } elseif ($this->isChildSupported($name)) {
            return $this->getChildValue($name);

        } else {
            throw new PropertyIsNotSupportedException();
        }
    }

    /**
     * @param string $name
     * @param mixed $value
     *
     * @throws PropertyIsNotSupportedException
     */
    public function __set($name, $value)
    {
        Config::getInstance()->getLogger('AbstractModel')->debug(
            'Attempt to set value for the property',
            array('class' => get_called_class(), 'name' => $name, 'value' => $value)
        );

        if ($this->isAttributeSupported($name)) {
            $this->setAttributeValue($name, $value);

        } elseif ($this->isChildSupported($name)) {
            $this->setChildValue($name, $value);

        } else {
            throw new PropertyIsNotSupportedException();
        }
    }

    /**
     * @return mixed
     */
    public function getElementContent()
    {
        return $this->elementContent;
    }

    /**
     * @param mixed $elementContent
     */
    public function setElementContent($elementContent)
    {
        $this->elementContent = $elementContent;
    }
}
