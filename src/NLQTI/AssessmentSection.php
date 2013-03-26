<?php
/**
 * Created by JetBrains PhpStorm. 
 * Date: 25.03.13
 * Time: 17:43
 */

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
 */
class AssessmentSection extends AbstractModel
{
    /**
     * @var Selection
     */
    protected $selection;

    /**
     * @var Ordering
     */
    protected $ordering;

    /**
     * @var RubricBlock
     */
    protected $rubricBlock;

    /**
     * @var AssessmentItemRef
     */
    protected $assessmentItemRef;

    /**
     * Deeper levels of <assessmentSection>’s is not allowed.
     *
     * @var AssessmentSection
     */
    protected $assessmentSection;

    /**
     * @return array
     */
    protected function bindAttributesToTypes()
    {
        return array(
            'identifier' => new StringDataType(),
            'required' => new BooleanDataType(),
            'title' => new StringDataType(),
            'visible' => new BooleanDataType(),
            'keepTogether' => new BooleanDataType(true),
        );
    }
}
