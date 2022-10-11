<?php

/// Function who's purpose is to store all data into a defined array
function getData($path)
{
    $lines = [];
    if ($file = fopen($path, "r")) {
        while (!feof($file)) {
            $textperline = fgets($file);
            $textperline = preg_replace('/[\r\n]+/', '', $textperline);
            $lines[] = $textperline;
        }
        fclose($file);
    }
    return $lines;
}

$count = 0;
$lines = getData("Aoc.txt");

for($x = 0; $x < count($lines); $x++){
    $a = $lines[$x] + $lines[$x+1] + $lines[$x+2];
    $b = $lines[$x+1] + $lines[$x+2] + $lines[$x+3];
    if($a < $b)
    $count++;
}
echo $count;


?>