<?php 

echo NumberToWords(80);

function NumberToWords($number) {

    $conjunction = ' and ';
	
	$words = ""; 

    $dictionary  = array(
        0 => 'zero',
        1 => 'one',
        2 => 'two',
        3 => 'three',
        4 => 'four',
        5 => 'five',
        6 => 'six',
        7 => 'seven',
        8 => 'eight',
        9 => 'nine',
        10 => 'ten',
        11 => 'eleven',
        12 => 'twelve',
        13 => 'thirteen',
        14 => 'fourteen',
        15 => 'fifteen',
        16 => 'sixteen',
        17 => 'seventeen',
        18 => 'eighteen',
        19 => 'nineteen',
        20 => 'twenty',
        30 => 'thirty',
        40 => 'forty',
        50 => 'fifty',
        60 => 'sixty',
        70 => 'seventy',
        80 => 'eighty',
        90 => 'ninety',
        100 => 'hundred',
        1000 => 'thousand'
    );

	/* In-case our value is not a number then we simply return false */	
    if (!is_numeric($number)) {
        return false;
    }
	
	if($number <= 20) {
		
		// Simply pass the value as key and you get the answer - this case will handle 1,2,3 till 20.
		$words = $dictionary[$number];
		
	} else if ($number <=99) {
		
		/* 
			simple maths to get the 10th position and first position: 
			e.g 95, if we divide 95/10 = 9.5 and get the floor of 9.5, it will return you 9 multiple that by 10 = 90 and the minus real value = 95 - 90 = 5
			
		*/
		
		$tenthpos  = floor($number/10)*10;
		$unitpos = $number - $tenthpos;
		if($unitpos == 0) {
			$words = $dictionary[$tenthpos]; //handling cases like 30 40 50 60 70 80 90
		} else {
			$words = $dictionary[$tenthpos].' '.$dictionary[$unitpos];
		}
		
	}

    return $words;
}

?>