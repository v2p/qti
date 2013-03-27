<?php
/**
 * Created by JetBrains PhpStorm.
 * User: vova
 * Date: 3/25/13
 * Time: 8:08 PM
 * To change this template use File | Settings | File Templates.
 */

namespace NLQTI;

use NLQTI\Base\AbstractModel;

/**
 * Class Weight
 *
 * @package NLQTI
 */
class Weight extends AbstractModel
{
    /**
     * @var string
     */
    protected $identifier = 'WEIGHT';

    /**
     * @var string
     */
    protected $value;

    /**
     * @var ContentElement
     */
    protected $contentElement;

    /**
     * @return array
     */
    protected function initAttributesConfiguration()
    {
        // TODO: Implement initAttributesConfiguration() method.
    }

    /**
     * @return array
     */
    protected function initChildrenConfiguration()
    {
        // TODO: Implement initChildrenConfiguration() method.
    }
}