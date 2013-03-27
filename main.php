<?php
/**
 * Created by JetBrains PhpStorm.
 * Date: 3/28/13
 * Time: 12:11 AM
 */

spl_autoload_register(function($class)
{
    $file = __DIR__.'/src/'.strtr($class, '\\', '/').'.php';

    if (file_exists($file)) {
        require $file;
        return true;
    }
});

$reader = new \Tools\QTIReader('examples/Tests/assessmentTest_SCORE.xml');
$reader->go();



