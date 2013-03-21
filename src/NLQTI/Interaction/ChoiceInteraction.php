<?php
/**
 * Created by JetBrains PhpStorm. 
 * Date: 18.03.13
 * Time: 17:50
 */

namespace NLQTI\Interaction;
 
use NLQTI\Choice\SimpleChoice;
use NLQTI\Prompt;

/**
 * Class ChoiceInteraction
 *
 * @package NLQTI\Interaction
 */
class ChoiceInteraction
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $class;

    /**
     * @var string
     */
    protected $lang;

    /**
     * @var string
     */
    protected $label;

    /**
     * @var string
     */
    protected $responseIdentifier = 'RESPONSE';

    /**
     * @var bool
     */
    protected $shuffle;

    /**
     * Only two values allowed:
     * - 0 For questions with (optional) multiple answers (Multiple Choice, Multiple Answer, MCMA)
     * - 1 For questions with a single answer (Multiple Choice, Single Answer, MCSA)
     *
     * @var int
     */
    protected $maxChoices;

    /**
     * @var Prompt|null
     */
    protected $prompt = null;

    /**
     * @var SimpleChoice[]
     */
    protected $simpleChoices;
}
