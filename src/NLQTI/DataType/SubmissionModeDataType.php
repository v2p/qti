<?php
/**
 * Created by JetBrains PhpStorm. 
 * Date: 26.03.13
 * Time: 17:04
 */

namespace NLQTI\DataType;

use NLQTI\Base\AbstractEnumerationDataType;

class SubmissionModeDataType extends AbstractEnumerationDataType
{
    /**
     * The results of an item are handled when finishing the item
     */
    const INDIVIDUAL = 'individual';

    /**
     * The results of all items are handled all together at the end of the test
     *
     * Watch out: simultaneous mode also means that feedback on item level will not occur! All results
     * processing, including feedback handling, is postponed until the end of the test.
     *
     */
    const SIMULTANEOUS = 'simultaneous';

    /**
     * @return string
     */
    protected function getDefaultValue()
    {
        return self::INDIVIDUAL;
    }

    /**
     * @return array
     */
    protected function getPossibleValues()
    {
        return array(self::INDIVIDUAL, self::SIMULTANEOUS);
    }
}
