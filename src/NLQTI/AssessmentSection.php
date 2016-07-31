<?php

namespace NLQTI;

use NLQTI\Base\AbstractModel;
use NLQTI\DataType\BooleanDataType;
use NLQTI\DataType\StringDataType;

/**
 * Class AssessmentSection
 * The profile defines underneath the testPart level a single <assessmentSection> element. This is called the main assessmentSection level
 *
 * There has to be at least one assessmentItemRef or assessmentSection element present in the main assessmentSection
 *
 * @package NLQTI
 *
 * @property string $identifier
 *
 * @property bool $required Meaning: When doing a random pre-selection this section must always be selected.
 *
 * @property string $title
 *
 * @property bool $visible Is the fact that there is a section visible to the learner?
 *
 * @property bool $keepTogether True (default): The content of this section must be kept together.
 *  False (applicable only for visible=”false”): The content in this section can be mingled with the content of the surrounding section
 *
 * @property Selection $selection
 * @property Ordering $ordering
 * @property RubricBlock[] $rubricBlock
 * @property AssessmentItemRef[] $assessmentItemRef
 * @property AssessmentSection[] $assessmentSection
 */
class AssessmentSection extends AbstractModel
{
    /**
     * @return array
     */
    protected function initAttributesConfiguration()
    {
        return array(
            'identifier' => array(new StringDataType(), self::SINGLE_MANDATORY),
            'required' => array(new BooleanDataType(), self::SINGLE_OPTIONAL),
            'title' => array(new StringDataType(), self::SINGLE_MANDATORY),
            'visible' => array(new BooleanDataType(), self::SINGLE_MANDATORY),
            'keepTogether' => array(new BooleanDataType(true), self::SINGLE_OPTIONAL),
        );
    }

    /**
     * @return array
     */
    protected function initChildrenConfiguration()
    {
        return array(
            'selection' => array(Selection::getClass(), self::SINGLE_OPTIONAL),
            'ordering' => array(Ordering::getClass(), self::SINGLE_OPTIONAL),
            'rubricBlock' => array(RubricBlock::getClass(), self::MULTIPLE_OPTIONAL),
            'assessmentItemRef' => array(AssessmentItemRef::getClass(), self::MULTIPLE_OPTIONAL),
            'assessmentSection' => array(AssessmentSection::getClass(), self::MULTIPLE_OPTIONAL),
        );
    }
}
