<?php

require_once 'vendor/autoload.php';

$reader = new \Tools\QTIReader('examples/Tests/assessmentTest_SCORE.xml');
$reader->go();



