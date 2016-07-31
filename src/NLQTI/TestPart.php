<?php

namespace NLQTI;

use NLQTI\Base\AbstractModel;
use NLQTI\DataType\Enumeration\NavigationModeDataType;
use NLQTI\DataType\Enumeration\SubmissionModeDataType;
use NLQTI\DataType\StringDataType;

/**
 * Class TestPart
 * The first level for QTI tests
 *
 * @package NLQTI
 *
 * @property string $identifier
 * @property string $navigationMode
 * @property string $submissionMode
 *
 * @property ItemSessionControl $itemSessionControl
 * @property AssessmentSection $assessmentSection
 */
class TestPart extends AbstractModel
{
    /**
     * @return array
     */
    protected function initAttributesConfiguration()
    {
        return array(
            'identifier' => array(new StringDataType(), self::SINGLE_MANDATORY),
            'navigationMode' => array(new NavigationModeDataType(), self::SINGLE_MANDATORY),
            'submissionMode' => array(new SubmissionModeDataType(), self::SINGLE_MANDATORY),
        );
    }

    /**
     * @return array
     */
    protected function initChildrenConfiguration()
    {
        return array(
            'assessmentSection' => array(AssessmentSection::getClass(), self::SINGLE_MANDATORY),
            'itemSessionControl' => array(ItemSessionControl::getClass(), self::SINGLE_OPTIONAL),
        );
    }
}
