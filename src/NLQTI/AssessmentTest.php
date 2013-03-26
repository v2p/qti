<?php
/**
 * Created by JetBrains PhpStorm. 
 * Date: 25.03.13
 * Time: 16:47
 */

namespace NLQTI;

use NLQTI\Base\AbstractModel;
use NLQTI\DataType\String256DataType;
use NLQTI\DataType\StringDataType;
use NLQTI\Declaration\OutcomeDeclaration;

/**
 * Class AssessmentTest
 * A QTI test is a separate XML document for which the root element is always <assessmentTest>
 *
 * @package NLQTI
 *
 * @property string $identifier
 * @property string $title
 * @property string $toolName
 * @property string $toolVersion
 */
class AssessmentTest extends AbstractModel
{
    /**
     * @var OutcomeDeclaration[]
     */
    protected $outcomeDeclaration;

    /**
     * @var TimeLimits[]
     */
    protected $timeLimits;

    /**
     * @var TestPart
     */
    protected $testPart;

    /**
     * @var OutcomeProcessing[]
     */
    protected $outcomeProcessing;

    /**
     * @var TestFeedback[]
     */
    protected $testFeedback;

    /**
     * @return array
     */
    protected function bindAttributesToTypes()
    {
        return array(
            'identifier' => new StringDataType(),
            'title' => new StringDataType(),
            'toolName' => new String256DataType(),
            'toolVersion' => new String256DataType(),
        );
    }
}