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


for($h = 0;$h < 12;$h++){

    // counter for the ones
    $onesCounter = 0;
    // counter for the zeros
    $zerosCounter = 0;

    // Counter loop
    for($i = 0;$i < count($input);$i++){
        if(substr($input[$h],$h,1) == '1'){
           $onesCounter++;
        }
        else{
           $zerosCounter++;
        }
    }
    
    // if there's more ones than zeros replace all zeros by 2 (so i dont use them in the counter loop)
    if($onesCounter > $zerosCounter){
        for($i = 0;$i < count($input);$i++){
            if(substr($input[$i],$h,1) == '0'){
               $input[$i] = 2;
            }
        }
    }
    // if there's an equal amount we take the zeros by default
    elseif($onesCounter == $zerosCounter){
        for($i = 0;$i < count($input);$i++){
            if(substr($input[$i],$h,1) == '0'){
               $input[$i] = 2;
            }
        }
    }
    // if there's more zeros than ones replace all ones by 2
    else{
        for($i = 0;$i < count($input);$i++){
            if(substr($input[$i],$h,1) == '1'){
               $input[$i] = 2;
            }
        }
    }

    // if there are equal numbers
    if($zerosCounter == 0 && $onesCounter == 1){
        for($i = 0;$i < count($input);$i++){
            if(substr($input[$h],$h,1) == '1'){
              $endOne = $input[$i];
            }       
        }
        break;
    }
    elseif($zerosCounter == 1 && $onesCounter == 0){
        for($i = 0;$i < count($input);$i++){
            if(substr($input[$i],$h,1) == '0'){
              $endTwo = $input[$i];
            }       
        }
        break; 
    }
}
echo(bindec($endOne) . "  " . bindec($endTwo));


?>