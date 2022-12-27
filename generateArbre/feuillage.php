<?php 
$pickColorFeuille = getColor($pickColorFeillage, rand(-1,1)) ;

$feuillage = '<polygon ' ;

$stroke = (18 - $f * 2) ;

if (rand(1,3) ==1) {
	$feuillage .= 'class="feuillageVent'.rand(1,3).'" data-base-stroke="'.$stroke.'"' ;
}

$feuillage .= 'stroke="rgb('.$pickColorFeuille[0].','.$pickColorFeuille[1].','.$pickColorFeuille[2].')"
fill="rgb('.$pickColorFeuille[0].','.$pickColorFeuille[1].','.$pickColorFeuille[2].')"
stroke-width="'.$stroke.'"
stroke-linejoin="round" 
opacity="1"
points="' ;

$baseX = $startX + $destinationX; 
$baseY = $startY + $destinationY; 

$mult = 6 - 2 * $f ;
$nPoint = rand(5,10);

$savepoint = array() ;

for ($n=0; $n < $nPoint ; $n++) { 

	$calcX =$baseX + rand($mult * -1,$mult); 

	if ( $calcX > 90) {
		$calcX = rand(85,90); 
	}

	if ( $calcX < 10) {
		$calcX = rand(10,15); 
	}
	$feuillage .=   round($calcX,1) ;
	$feuillage .= ' , ';

	$calcY =$baseY + rand($mult * -1,$mult);
	$feuillage .=  round($calcY,1);

	$feuillage .= " " ;
	$savepoint[] = ($calcX + rand(-1,10)).','.($calcY + rand(-1,10)) ;

/*
	$saveValueX[] = $calcX ;
	$saveValueY[] = $calcY ;
	*/
} 
$feuillage .= '" 

data-points="'.implode(' ', $savepoint).'"

>


</polygon>' ;

if (rand(1,5) <= 4){
	$backgroundFeuillage .= $feuillage ;
} else {
	$saveFeuillage .= $feuillage ;
}


?>