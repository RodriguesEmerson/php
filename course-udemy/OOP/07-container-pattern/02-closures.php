<?php

$variable = "Outside <br>";

/**
 * If I not use the keyword "use" in this type of function, I can't use any variable from outside.
 */
$print_5x = function() use ($variable){
   var_dump($variable);
   var_dump("Hello World " . $variable . "<br>");
   var_dump("Hello World " . $variable . "<br>");
   var_dump("Hello World " . $variable . "<br>");
   var_dump("Hello World " . $variable . "<br>");
   var_dump("Hello World " . $variable . "<br>");
};

$print_5x();