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
        //$this->makeSomeNoise($this->xmlIterator);

        $this->classStructure = $this->buildClasses($this->xmlIterator);
    }

    /**
     * @param \SimpleXMLIterator $iterator
     */
    protected function makeSomeNoise($iterator)
    {
        echo $iterator->getName(), ' (';

        /** @var \SimpleXMLElement $attribute */
        foreach ($iterator->attributes() as $attribute) {
            echo $attribute, ', ';
        }

        echo ')', "\n";

        for ($iterator->rewind(); $iterator->valid(); $iterator->next()) {
            $this->makeSomeNoise($iterator->current());
        }
    }

    /**
     * @param \SimpleXMLIterator $elementIterator
     * @throws \Exception
     * @return \NLQTI\Base\AbstractModel
     */
    protected function buildClasses($elementIterator)
    {
        $elementName = $elementIterator->getName();

        if (!$className = Config::resolveClassByElementName($elementName)) {
            throw new \Exception();
        }

        try {
            /** @var AbstractModel $entity */
            $entity = new $className();
        } catch (NotImplementedException $e) {
            return null;
        }

        // fill attributes:
        /** @var \SimpleXMLElement $attribute */
        foreach ($elementIterator->attributes() as $attribute) {
            $entity->{$attribute->getName()} = strval($attribute);
        }

        // fill children entities:
        for ($elementIterator->rewind(); $elementIterator->valid(); $elementIterator->next()) {

            if ($elementName == 'assessmentTest') {
                continue;
            }

            $entity->{$elementName} = $this->buildClasses($elementIterator->current());
        }

        return $entity;
    }
}