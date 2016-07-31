<?php

namespace NLQTI\Choice;

/**
 * Class SimpleAssociableChoice
 *
 * @package NLQTI\Choice
 */
class SimpleAssociableChoice
{
    /**
     * @var string|null
     */
    protected $id = null;

    /**
     * @var string|null
     */
    protected $class = null;

    /**
     * @var string|null
     */
    protected $lang = null;

    /**
     * @var string|null
     */
    protected $label = null;

    /**
     * @var string
     */
    protected $identifier;

    /**
     * @var int
     */
    protected $matchMax = 1;

    /**
     * @var int
     */
    protected $matchMin = 1;
}
