<?php

namespace NLQTI\DataType\Enumeration;

use NLQTI\Base\AbstractEnumerationDataType;

class TestFeedbackIdentifierDataType extends AbstractEnumerationDataType
{
    const RESULT_UNKNOWN = '(null)'; // no answer given (yet)
    const RESULT_OK = 'RESULT_OK'; // test passed
    const RESULT_NOTOK = 'RESULT_NOTOK'; // test failed

    /**
     * @return mixed
     */
    protected function getDefaultValue()
    {
        return self::RESULT_UNKNOWN;
    }

    /**
     * @return array
     */
    protected function getPossibleValues()
    {
        return array(self::RESULT_UNKNOWN, self::RESULT_NOTOK, self::RESULT_OK);
    }
}