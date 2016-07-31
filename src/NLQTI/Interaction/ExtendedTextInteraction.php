<?php

namespace NLQTI\Interaction;

use NLQTI\Prompt;

/**
 * Class ExtendedTextInteraction
 *
 * @package NLQTI\Interaction
 */
class ExtendedTextInteraction
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
     * @var int
     */
    protected $expectedLength;

    /**
     * @var int
     */
    protected $expectedLines;

    /**
     * @var string
     */
    protected $format = 'plain';

    /**
     * @var Prompt|null
     */
    protected $prompt = null;
}
