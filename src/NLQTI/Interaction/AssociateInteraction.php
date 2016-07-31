<?php

namespace NLQTI\Interaction;

use NLQTI\Choice\SimpleAssociableChoice;
use NLQTI\Prompt;

/**
 * Class AssociateInteraction
 * Allows associating elements from a set with each other
 *
 * @package NLQTI\Interaction
 */
class AssociateInteraction
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
     * @var int
     */
    protected $maxAssociations;

    /**
     * @var Prompt|null
     */
    protected $prompt = null;

    /**
     * @var SimpleAssociableChoice[]
     */
    protected $simpleAssociableChoices;
}
