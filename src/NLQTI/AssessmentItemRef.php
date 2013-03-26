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
 */
class AssessmentItemRef extends AbstractModel
{
    /**
     * @var ItemSessionControl[]
     */
    protected $itemSessionControl;

    /**
     * @var TimeLimits[]
     */
    protected $timeLimits;

    /**
     * @var Weight
     */
    protected $weight;

    /**
     * @return array
     */
    protected function bindAttributesToTypes()
    {
        return array(
            'identifier' => new StringDataType(),
            'required' => new BooleanDataType(),
            'href' => new UriDataType(),
        );
    }
}