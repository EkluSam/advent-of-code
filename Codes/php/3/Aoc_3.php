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

const INPUTLENGTH = 12; 
$input = getData("input.txt");

// ------------------------------------ FIRST PART ----------------------------- //
// array of bits for the gammaRate
$gammaRate = array(12);  
// array of bits for the epsilonRate
$epsilonRate = array(12);  



// -------------  GammaRate ----------- //

// loop that indicate the position of the bit we're counting
for($h = 0;$h < 12;$h++){
    // counter for the ones
    $onesCounter = 0;
    // counter for the zeros
    $zerosCounter = 0;

    // for loop that counts how many times 1 is in the start of each lines
    for($i = 0;$i < count($input);$i++){
        if(substr($input[$i],$h,1) == '1'){
            $onesCounter++;
        }
        else{
            $zerosCounter++;
        }
    }
    
    if($onesCounter > $zerosCounter){
        $gammaRate[$h] = 1;
    }
    else{
        $gammaRate[$h] = 0;
    }
}

// ------------ EpsilonRate ---------- // 


for($h = 0;$h < 12;$h++){
    // counter for the ones (setting it to 0)
    $onesCounter = 0;
    // counter for the zeros (setting it to 0)
    $zerosCounter = 0; 
    // for loop that counts how many times 0 is in the start of each lines
    for($i = 0;$i < count($input);$i++){
        if(substr($input[$i],$h,1) == '0'){
            $onesCounter++;
        }
        else{
            $zerosCounter++;
        }
    }
    
    if($onesCounter > $zerosCounter){
        $epsilonRate[$h] = 1;
    }
    else{
        $epsilonRate[$h] = 0;
    }
}

$gammaRateBinary = implode("",$gammaRate);
$epsilonRateBinary = implode("",$epsilonRate);
echo("first part" . bindec($gammaRateBinary)+bindec($epsilonRateBinary));

// ------------------- SECOND PART --------------------------- // 

// counter for the ones (setting it to 0)
$onesCounter = 0;
// counter for the zeros (setting it to 0)
$zerosCounter = 0; 
// bit position in the binary number

// finding the oxygen generator rating
for($bitPos = 0; $bitPos < INPUTLENGTH;$bitPos++){
    // count ones and zeros in the current bit position
    for($i = 0;$i < count($input);$i++){
        if(substr($input[$i],$bitPos,1) == '1'){
            $onesCounter++;
        }
        else{
            $zerosCounter++;
        }
    }

    if($onesCounter >= $zerosCounter){
        // get rid of all the inputs that have 0 in the current bit position
        for($i = 0;$i < count($input);$i++){
            if(substr($input[$i],$bitPos,1) == '0'){
               unset($input[$i]);
            }
        }
    }
    else{
        // get rid of all the undesired inputs that have 1 in the current bit position
        for($i = 0;$i < count($input);$i++){
            if(substr($input[$i],$bitPos,1) == '1'){
               unset($input[$i]);
            }
        }
    }
}


echo(bindec($endOne) . "  " . bindec($endTwo));


?>