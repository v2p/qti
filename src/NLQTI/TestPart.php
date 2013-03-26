<?php
/**
 * Created by JetBrains PhpStorm. 
 * Date: 25.03.13
 * Time: 16:58
 */

namespace NLQTI;

use NLQTI\Base\AbstractModel;
use NLQTI\DataType\NavigationModeDataType;
use NLQTI\DataType\StringDataType;
use NLQTI\DataType\SubmissionModeDataType;

/**
 * Class TestPart
 * The first level for QTI tests
 *
 * @package NLQTI
 *
 * @property string $identifier
 * @property string $navigationMode
 * @property string $submissionMode
 */
class TestPart extends AbstractModel
{
    /**
     * @var ItemSessionControl[]
     */
    protected $itemSessionControl;

    /**
     * @var AssessmentSection
     */
    protected $assessmentSection;

    /**
     * @return array
     */
    protected function bindAttributesToTypes()
    {
        return array(
            'identifier' => new StringDataType(),
            'navigationMode' => new NavigationModeDataType(),
            'submissionMode' => new SubmissionModeDataType(),
        );
    }
}
