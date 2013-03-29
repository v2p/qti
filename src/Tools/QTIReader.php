<?php
/**
 * Created by JetBrains PhpStorm.
 * Date: 3/27/13
 * Time: 11:56 PM
 */

namespace Tools;

use NLQTI\Base\AbstractModel;
use NLQTI\Exception\NotImplementedException;

class QTIReader
{
    /**
     * @var \SimpleXMLIterator
     */
    protected $xmlIterator;

    /**
     * @var AbstractModel
     */
    protected $classStructure;

    /**
     * @param $filename
     */
    public function __construct($filename)
    {
        $this->xmlIterator = new \SimpleXMLIterator($filename, null, true);
    }

    public function go()
    {
        $this->classStructure = $this->buildClasses($this->xmlIterator);
    }

    /**
     * @param \SimpleXMLIterator $elementIterator
     * @throws \Exception
     * @return \NLQTI\Base\AbstractModel
     */
    protected function buildClasses($elementIterator)
    {
        $elementName = $elementIterator->getName();

        if (!$className = Config::getInstance()->resolveClassByElementName($elementName)) {
            throw new \Exception();
        }

        try {
            /** @var AbstractModel $entity */
            $entity = new $className();
        } catch (NotImplementedException $e) {
            Config::getInstance()->getLogger('QTIReader')->warn('Not implemented entity exception received', array('className' => $className));
            return null;
        }

        // fill attributes:
        /** @var \SimpleXMLElement $attribute */
        foreach ($elementIterator->attributes() as $attribute) {

            $attributeName = $attribute->getName();

            Config::getInstance()->getLogger('QTIReader')->debug('Look at the attribute', array('attribute' => $attributeName));

            $entity->$attributeName = strval($attribute);
        }

        // fill children entities:
        for ($elementIterator->rewind(); $elementIterator->valid(); $elementIterator->next()) {

            /** @var \SimpleXMLIterator $child */
            $child = $elementIterator->current();
            $childName = $child->getName();

            Config::getInstance()->getLogger('QTIReader')->debug('Look at the child', array('child' => $childName));

            if ($childEntity = $this->buildClasses($child)) {
                $entity->{$childName} = $childEntity;
            }
        }

        return $entity;
    }
}