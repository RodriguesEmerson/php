<?php
  


/**
 * This function will generate all the letter of the alphabet as
 * an array:
 * ['A', 'B', 'C',...]
 */
function gen_alphabet(): array{
    $A = ord('A'); //It gets the number associated to the letter - 65;
    $Z = ord('Z'); // - 90

    $letters = [];
    for ($letterOrd = $A; $letterOrd <= $Z; $letterOrd++) {
        $letters[] = chr($letterOrd); //It gets the character associated to the number;
    };
    return $letters;
}

/**
 * This function returns a securely value to print on the screen;
 */
function e($value){
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
