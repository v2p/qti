<?php
/**
 * Created by JetBrains PhpStorm. 
 * Date: 25.03.13
 * Time: 17:43
 */

namespace NLQTI;

/**
 * Class AssessmentSection
 * The profile defines underneath the testPart level a single <assessmentSection> element. This is called the main assessmentSection level
 *
 * There has to be at least one assessmentItemRef or assessmentSection element present in the main assessmentSection
 *
 * @package NLQTI
 */
class AssessmentSection
{
    //region Attributes
    /**
     * @var string
     */
    protected $identifier;

    /**
     * @var string
     */
    protected $title;

    /**
     * Is the fact that there is a section visible to the learner?
     *
     *  - true: The rendering engine is allowed to show the existence of the section to the learner,
     * for instance in some kind of hierarchical overview.
     *
     *  - false: The rendering engine is not allowed to show the existence of the section to the learner.
     * All content in this section must be shown as part of the surrounding section.
     *
     * @var bool
     */
    protected $visible;

    /**
     * - true (default): The content of this section must be kept together.
     * - false (applicable only for visible=”false”): The content in this section can be mingled with the content of the surrounding section
     *
     * @var bool
     */
    protected $keepTogether;

    //endregion

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
     * @var AssessmentSection
     */
    protected $assessmentSection;
}
