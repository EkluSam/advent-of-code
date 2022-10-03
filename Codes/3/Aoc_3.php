<?php 
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


$input = getData("input.txt");

$gammaRate = array(12);
$epsilonRate = array(12);
$onesCounter;
$zerosCounter;

for($i = 0;$i < count($input);$i++){

}
?>