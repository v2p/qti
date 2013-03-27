<?php
/**
 * Created by JetBrains PhpStorm. 
 * Date: 18.03.13
 * Time: 15:25
 */

namespace NLQTI;

use NLQTI\Declaration\OutcomeDeclaration;
use NLQTI\Declaration\ResponseDeclaration;
use NLQTI\Feedback\ModalFeedback;
use NLQTI\Processing\ResponseProcessing;

/**
 * Class AssessmentItem
 *
 * <assessmentItem ...>
 *   <responseDeclaration ...>
 *   <!-- Information about the answer -->
 *   </responseDeclaration>
 *
 *    <outcomeDeclaration ...>
 *    <!-- Variables with information about the outcome (score, etc.) -->
 *    </outcomeDeclaration>
 *
 *    <itemBody ...>
 *    <!-- The question itself -->
 *    </itemBody>
 *
 *    <responseProcessing ...>
 *    <!-- What to do with the result -->
 *    </responseProcessing>
 *
 *    <modalFeedback ...>
 *    <!-- Optional feedback to the learner -->
 *    </modalFeedback>
 *
 * </assessmentItem>
 *
 * @package NLQTI
 */
class AssessmentItem
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
     * @var bool
     */
    protected $adaptive = false;

    /**
     * @var bool
     */
    protected $timeDependent = false;

    /**
     * @var string
     */
    protected $lang = null;

    /**
     * @var string
     */
    protected $label = null;

    /**
     * @var string
     */
    protected $toolName = null;

    /**
     * @var string
     */
    protected $toolVersion = null;
    //endregion

    /**
     * Information about the answer
     *
     * @var ResponseDeclaration[]
     */
    protected $responseDeclarations;

    /**
     * Variables with information about the outcome (score, etc.)
     *
     * @var OutcomeDeclaration[]
     */
    protected $outcomeDeclarations;

    /**
     * The question itself
     *
     * @var ItemBody
     */
    protected $itemBody;

    /**
     * What to do with the result
     *
     * @var ResponseProcessing|null
     */
    protected $responseProcessing;

    /**
     * Optional feedback to the learner
     *
     * @var ModalFeedback[]
     */
    protected $modalFeedbacks;

}
