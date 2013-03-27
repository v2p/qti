<?php
/**
 * Created by JetBrains PhpStorm. 
 * Date: 18.03.13
 * Time: 15:40
 */

namespace NLQTI\Declaration;

use NLQTI\Base\AbstractModel;

/**
 * Class OutcomeDeclaration
 * Variables with information about the outcome (score, etc.)
 *
 * @package NLQTI\Declaration
 *
 * @property string $identifier
 * @property string $cardinality
 * @property string $baseType
 * @property string $view
 */
class OutcomeDeclaration extends AbstractModel
{
    /**
     * @return array
     */
    protected function initAttributesConfiguration()
    {
        return array(
            'identifier' => array(),
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
