<?php

namespace NLQTI;

use NLQTI\Base\AbstractModel;
use NLQTI\DataType\BooleanDataType;
use NLQTI\DataType\IntDataType;

/**
 * Class ItemSessionControl
 *
 * @package NLQTI
 *
 * @property int $maxAttempts
 * @property bool $showFeedback
 * @property bool $allowReview
 * @property bool $showSolution
 * @property bool $allowComment
 * @property bool $allowSkipping
 * @property bool $validateResponses
 */
class ItemSessionControl extends AbstractModel
{

    /**
     * @return array
     */
    protected function initAttributesConfiguration()
    {
        return array(
            'maxAttempts' => array(new IntDataType(1), self::SINGLE_OPTIONAL),
            'showFeedback' => array(new BooleanDataType(false), self::SINGLE_OPTIONAL),
            'allowReview' => array(new BooleanDataType(true), self::SINGLE_OPTIONAL),
            'showSolution' => array(new BooleanDataType(false), self::SINGLE_OPTIONAL),
            'allowComment' => array(new BooleanDataType(false), self::SINGLE_OPTIONAL),
            'allowSkipping' => array(new BooleanDataType(true), self::SINGLE_OPTIONAL),
            'validateResponses' => array(new BooleanDataType(true), self::SINGLE_OPTIONAL),
        );
    }

    /**
     * @return array
     */
    protected function initChildrenConfiguration()
    {
        return array();
    }
}