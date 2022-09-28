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
$count = 0;
$lines = getData("Aoc.txt");
for($x = 1; $x < count($lines); $x++){
    if($lines[$x] > $lines[$x-1])
    $count++;
}
echo $count;


?>