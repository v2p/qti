<?php

namespace Tools;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Config
{
    protected $elementToClassMap = array(
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

    protected $loggersInstances;

    /**
     * @var Config
     */
    protected static $instance;

    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    protected function init()
    {
        $this->loggersInstances = array(
            '__default__' => new Logger('Default', array(new StreamHandler('php://stdout'))),

            'QTIReader' => new Logger('QTIReader', array(new StreamHandler('php://stdout'))),
            'AbstractModel' => new Logger('AbstractModel', array(new StreamHandler('php://stdout'))),
        );
    }

    /**
     * @param string $elementName
     * @return bool|string
     */
    public function resolveClassByElementName($elementName)
    {
        if (!isset($this->elementToClassMap[$elementName])) {
            return false;
        }

        return $this->elementToClassMap[$elementName];
    }

    /**
     * @param $channelName
     *
     * @return Logger
     */
    public function getLogger($channelName)
    {
        if (isset($this->loggersInstances[$channelName])) {
            return $this->loggersInstances[$channelName];
        } else {
            return $this->loggersInstances['__default__'];
        }
    }

    public function __construct()
    {
        $this->init();
    }
}