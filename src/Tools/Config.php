<?php
/**
 * Created by JetBrains PhpStorm.
 * Date: 3/28/13
 * Time: 1:09 AM
 */

namespace Tools;


class Config
{
    protected static $elementToClassMap = array(
        //region NLQTI
        'assessmentitem' => '\NLQTI\AssessmentItem',
        'assessmentItemRef' => '\NLQTI\AssessmentItemRef',
        'assessmentSection' => '\NLQTI\AssessmentSection',
        'assessmentTest' => '\NLQTI\AssessmentTest',
        'itemBody' => '\NLQTI\ItemBody',
        'itemSessionControl' => '\NLQTI\ItemSessionControl',
        'ordering' => '\NLQTI\Ordering',
        'prompt' => '\NLQTI\Prompt',
        'rubricBlock' => '\NLQTI\RubricBlock',
        'selection' => '\NLQTI\Selection',
        'testPart' => '\NLQTI\TestPart',
        'timeLimits' => '\NLQTI\TimeLimits',
        'weight' => '\NLQTI\Weight',
        //endregion

        //region NLQTI\Choice
        'simpleAssociableChoice' => '\NLQTI\Choice\SimpleAssociableChoice',
        'simpleChoice' => '\NLQTI\Choice\SimpleChoice',
        //endregion

        //region NLQTI\Declaration
        'outcomeDeclaration' => '\NLQTI\Declaration\OutcomeDeclaration',
        'responseDeclaration' => '\NLQTI\Declaration\ResponseDeclaration',
        //endregion

        //region NLQTI\Feedback
        'modalFeedback' => '\NLQTI\Feedback\ModalFeedback',
        'testFeedback' => '\NLQTI\Feedback\TestFeedback',
        //endregion

        //region NLQTI\Interaction
        'associateInteraction' => '\NLQTI\Interaction\AssociateInteraction',
        'choiceInteraction' => '\NLQTI\Interaction\ChoiceInteraction',
        'extendedTextInteraction' => '\NLQTI\Interaction\ExtendedTextInteraction',
        //endregion

        //region NLQTI\Processing
        'outcomeProcessing' => '\NLQTI\Processing\OutcomeProcessing',
        'responseProcessing' => '\NLQTI\Processing\ResponseProcessing',
        //endregion
    );

    /**
     * @param string $elementName
     * @return bool|string
     */
    public static function resolveClassByElementName($elementName)
    {
        if (!isset(self::$elementToClassMap[$elementName])) {
            return false;
        }

        return self::$elementToClassMap[$elementName];
    }
}