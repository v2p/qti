<?php

namespace NLQTI;

use NLQTI\Base\AbstractModel;
use NLQTI\DataType\String256DataType;
use NLQTI\DataType\StringDataType;
use NLQTI\Feedback\TestFeedback;

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
 *
 * @property TestPart $testPart
 * @property TimeLimits $timeLimits
 * @property TestFeedback[] $testFeedback
 *
 * Not implemented:
 * property OutcomeDeclaration[] $outcomeDeclaration
 * property OutcomeProcessing $outcomeProcessing
 *
 */
class AssessmentTest extends AbstractModel
{
    /**
     * @return array
     */
    protected function initAttributesConfiguration()
    {
        return array(
            'identifier' => array(new StringDataType(), self::SINGLE_MANDATORY),
            'title' => array(new StringDataType(), self::SINGLE_MANDATORY),
            'toolName' => array(new String256DataType(), self::SINGLE_OPTIONAL),
            'toolVersion' => array(new String256DataType(), self::SINGLE_OPTIONAL),
        );
    }

    /**
     * @return array
     */
    protected function initChildrenConfiguration()
    {
        return array(
            'testPart' => array(TestPart::getClass(), self::SINGLE_MANDATORY),
            'timeLimits' => array(TimeLimits::getClass(), self::SINGLE_OPTIONAL),
            'testFeedback' => array(TestFeedback::getClass(), self::MULTIPLE_OPTIONAL),

            /*'outcomeDeclaration' => array(OutcomeDeclaration::getClass(), self::MULTIPLE_OPTIONAL),
            'outcomeProcessing' => array(OutcomeProcessing::getClass(), self::SINGLE_OPTIONAL),*/
        );
    }
}