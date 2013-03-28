<?php
/**
 * Created by JetBrains PhpStorm.
 * Date: 3/28/13
 * Time: 12:11 AM
 */

require_once 'vendor/autoload.php';

$reader = new \Tools\QTIReader('examples/Tests/assessmentTest_SCORE.xml');
$reader->go();



