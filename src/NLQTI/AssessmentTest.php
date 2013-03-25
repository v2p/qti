<?php
/**
 * Created by JetBrains PhpStorm. 
 * Date: 25.03.13
 * Time: 16:47
 */

namespace NLQTI;

use NLQTI\Declaration\OutcomeDeclaration;

/**
 * Class AssessmentTest
 * A QTI test is a separate XML document for which the root element is always <assessmentTest>
 *
 * @package NLQTI
 */
class AssessmentTest
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
     * @var string
     */
    protected $toolName;

    /**
     * @var string
     */
    protected $toolVersion;

    //endregion

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

}