<?php

namespace NLQTI\DataType\Enumeration;

use NLQTI\Base\AbstractEnumerationDataType;

/**
 * Class NavigationModeDataType
 *
 * @package NLQTI\DataType
 */
class NavigationModeDataType extends AbstractEnumerationDataType
{
    /**
     * The learner is allowed to handle the items ordered only. He/she is not allowed to navigate between items at random.
     */
    const LINEAR = 'linear';

    /**
     *  The learner is allowed to navigate between items at random
     */
    const NONLINEAR = 'nonlinear';

    /**
     * @return mixed
     */
    protected function getDefaultValue()
    {
        return self::LINEAR;
    }

    /**
     * @return array
     */
    protected function getPossibleValues()
    {
        return array(self::LINEAR, self::NONLINEAR);
    }
}
