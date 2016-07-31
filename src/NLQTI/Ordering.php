<?php

namespace NLQTI;

use NLQTI\Base\AbstractModel;
use NLQTI\DataType\BooleanDataType;

/**
 * Class Ordering
 * An <assessmentSection> is allowed to have an optional <ordering> element to define the randomization of the content.
 *
 * @package NLQTI
 *
 * @property bool $shuffle
 */
class Ordering extends AbstractModel
{
    /**
     * @return array
     */
    protected function initAttributesConfiguration()
    {
        return array(
            'shuffle' => array(new BooleanDataType(), self::SINGLE_MANDATORY),
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