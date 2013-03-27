<?php
/**
 * Created by JetBrains PhpStorm.
 * User: vova
 * Date: 3/25/13
 * Time: 8:01 PM
 * To change this template use File | Settings | File Templates.
 */

namespace NLQTI;

use NLQTI\Base\AbstractModel;
use NLQTI\DataType\BooleanDataType;
use NLQTI\DataType\StringDataType;
use NLQTI\DataType\UriDataType;

/**
 * Class AssessmentItemRef
 *
 * @package NLQTI
 *
 * @property string $identifier
 * @property bool $required Meaning: When doing a random pre-selection this section must always be selected.
 * @property string $href Reference to the item
 *
 * @property ItemSessionControl $itemSessionControl
 * @property TimeLimits $timeLimits
 * @property Weight $weight
 */
class AssessmentItemRef extends AbstractModel
{
    /**
     * @return array
     */
    protected function initAttributesConfiguration()
    {
        return array(
            'identifier' => array(new StringDataType(), self::SINGLE_MANDATORY),
            'required' => array(new BooleanDataType(), self::SINGLE_OPTIONAL),
            'href' => array(new UriDataType(), self::SINGLE_MANDATORY),
        );
    }

    /**
     * @return array
     */
    protected function initChildrenConfiguration()
    {
        return array(
            'itemSessionControl' => array(ItemSessionControl::getClass(), self::SINGLE_OPTIONAL),
            'timeLimits' => array(TimeLimits::getClass(), self::SINGLE_OPTIONAL),
            'weight' => array(Weight::getClass(), self::SINGLE_MANDATORY),
        );
    }
}