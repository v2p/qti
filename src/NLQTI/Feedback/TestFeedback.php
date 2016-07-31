<?php

namespace NLQTI\Feedback;

use NLQTI\Base\AbstractModel;
use NLQTI\DataType\Enumeration\TestFeedbackIdentifierDataType;
use NLQTI\DataType\StringDataType;

/**
 * Class TestFeedback
 *
 * @package NLQTI\Feedback
 *
 * @property string $access
 * @property string $outcomeIdentifier
 * @property string $showHide
 * @property string $identifier
 */
class TestFeedback extends AbstractModel
{
    /**
     * @return array
     */
    protected function initAttributesConfiguration()
    {
        return array(
            'access' => array(new StringDataType('atEnd'), self::SINGLE_MANDATORY),
            'outcomeIdentifier' => array(new StringDataType('FEEDBACK'), self::SINGLE_MANDATORY),
            'showHide' => array(new StringDataType('show'), self::SINGLE_MANDATORY),
            'identifier' => array(new TestFeedbackIdentifierDataType(), self::SINGLE_MANDATORY),
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