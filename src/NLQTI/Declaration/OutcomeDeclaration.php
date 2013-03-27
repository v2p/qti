<?php
/**
 * Created by JetBrains PhpStorm. 
 * Date: 18.03.13
 * Time: 15:40
 */

namespace NLQTI\Declaration;

use NLQTI\Base\AbstractModel;
use NLQTI\Exception\NotImplementedException;

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
     * @throws NotImplementedException
     * @return array
     */
    protected function initAttributesConfiguration()
    {
        throw new NotImplementedException();
    }

    /**
     * @throws NotImplementedException
     * @return array
     */
    protected function initChildrenConfiguration()
    {
        throw new NotImplementedException();
    }
}
