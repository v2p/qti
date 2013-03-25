<?php
/**
 * Created by JetBrains PhpStorm. 
 * Date: 25.03.13
 * Time: 16:58
 */

namespace NLQTI;

/**
 * Class TestPart
 * The first level for QTI tests
 *
 * @package NLQTI
 */
class TestPart
{
    //region Attributes
    /**
     * @var string
     */
    protected $identifier;

    /**
     * Values:
     * - linear: The learner is allowed to handle the items ordered only. He/she is not allowed to navigate between
     * items at random.
     *
     * - nonlinear: The learner is allowed to navigate between items at random
     *
     * @var string
     */
    protected $navigationMode;

    /**
     * Values:
     * - individual: The results of an item are handled when finishing the item
     *
     * - simultaneous: The results of all items are handled all together at the end of the test
     *
     * Watch out: simultaneous mode also means that feedback on item level will not occur! All results
     * processing, including feedback handling, is postponed until the end of the test.
     *
     * @var string
     */
    protected $submissionMode;

    //endregion

    /**
     * @var ItemSessionControl[]
     */
    protected $itemSessionControl;

    /**
     * @var AssessmentSection
     */
    protected $assessmentSection;
}
