<?php

namespace NLQTI;

use NLQTI\Base\AbstractModel;
use NLQTI\DataType\StringDataType;

/**
 * Class Weight
 *
 * @package NLQTI
 *
 * @property string $identifier
 * @property string $value
 */
class Weight extends AbstractModel
{
    public function setElementContent($elementContent)
    {
        $this->value = $elementContent;
    }

    public function getElementContent()
    {
        return $this->value;
    }

    /**
     * @return array
     */
    protected function initAttributesConfiguration()
    {
        return array(
            'identifier' => array(new StringDataType('WEIGHT'), self::SINGLE_MANDATORY),
            'value' => array(new StringDataType(), self::SINGLE_MANDATORY),
        );
    }

    /**
     * @return array
     */
    protected function initChildrenConfiguration()
    {
        return array();
    }
}