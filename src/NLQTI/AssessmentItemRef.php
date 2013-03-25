<?php
/**
 * Created by JetBrains PhpStorm.
 * User: vova
 * Date: 3/25/13
 * Time: 8:01 PM
 * To change this template use File | Settings | File Templates.
 */

namespace NLQTI;

/**
 * Class AssessmentItemRef
 *
 * @package NLQTI
 */
class AssessmentItemRef
{
    //region Attribures
    /**
     * @var string
     */
    protected $identifier;

    /**
     * Meaning: When doing a random pre-selection this section must always be selected.
     *
     * @var bool
     */
    protected $required;

    /**
     * Reference to the item
     *
     * @var string
     */
    protected $href;

    //endregion

    /**
     * @var ItemSessionControl[]
     */
    protected $itemSessionControl;

    /**
     * @var TimeLimits[]
     */
    protected $timeLimits;

    /**
     * @var Weight
     */
    protected $weight;
}