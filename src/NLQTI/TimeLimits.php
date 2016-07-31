<?php

namespace NLQTI;

use NLQTI\Base\AbstractModel;
use NLQTI\DataType\IntDataType;

/**
 * Class TimeLimits
 *
 * @package NLQTI
 *
 * @property int $minTime The minimum number of seconds a learner must take for this test/item (in seconds)
 * @property int $maxTime The maximum number of seconds a learner can take for this test/item (in seconds)
 */
class TimeLimits extends AbstractModel
{

    /**
     * @return array
     */
    protected function initAttributesConfiguration()
    {
        return array(
            'minTime' => array(new IntDataType(), self::SINGLE_OPTIONAL),
            'maxTime' => array(new IntDataType(), self::SINGLE_OPTIONAL),
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