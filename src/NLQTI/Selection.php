<?php
/**
 * Created by JetBrains PhpStorm. 
 * Date: 27.03.13
 * Time: 16:31 
 */

namespace NLQTI;

use NLQTI\Base\AbstractModel;
use NLQTI\DataType\IntDataType;

/**
 * Class Selection
 * An <assessmentSection> is allowed to have an optional <selection> element to define how
 * many components of the <assessmentSection> will be part of the final test. A component can be
 * an <assessmentSection> or <assessmentItemRef>
 *
 * @package NLQTI
 *
 * @property int $select This defines the number of components (<assessmentSection> or <assessmentItemRef>) in the final test.
 * It must (of course) be less than the number of components available.
 */
class Selection extends AbstractModel
{
    /**
     * @return array
     */
    protected function initAttributesConfiguration()
    {
        return array(
            'select' => array(new IntDataType(), self::SINGLE_MANDATORY),
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