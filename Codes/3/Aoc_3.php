<?php 
// Take the input and returns an array
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

// array of bits for the gammaRate
$gammaRate = array(12);  
// array of bits for the epsilonRate
$epsilonRate = array(12);  



// -------------  GammaRate ----------- //

// loop that indicate the position of the bit we're counting
for($x = 0;$x < 12;$x++){
    // counter for the ones
    $onesCounter = 0;
    // counter for the zeros
    $zerosCounter = 0;

    // for loop that counts how many times 1 is in the start of each lines
    for($i = 0;$i < count($input);$i++){
        if(substr($input[$i],$x,1) == '1'){
            $onesCounter++;
        }
        else{
            $zerosCounter++;
        }
    }
    
    if($onesCounter > $zerosCounter){
        $gammaRate[$x] = 1;
    }
    else{
        $gammaRate[$x] = 0;
    }
}

// ------------ EpsilonRate ---------- // 


for($x = 0;$x < 12;$x++){
    // counter for the ones (setting it to 0)
    $onesCounter = 0;
    // counter for the zeros (setting it to 0)
    $zerosCounter = 0; 
    // for loop that counts how many times 0 is in the start of each lines
    for($i = 0;$i < count($input);$i++){
        if(substr($input[$i],$x,1) == '0'){
            $onesCounter++;
        }
        else{
            $zerosCounter++;
        }
    }
    
    if($onesCounter > $zerosCounter){
        $epsilonRate[$x] = 1;
    }
    else{
        $epsilonRate[$x] = 0;
    }
}

$gammaRateBinary = implode("",$gammaRate);
$epsilonRateBinary = implode("",$epsilonRate);
echo($gammaRateBinary . "  " . $epsilonRateBinary);
echo("\n" . bindec($gammaRateBinary)*bindec($epsilonRateBinary));

?>