<?php 
$pickPossX = rand(0,80) ;

$svg = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="0"
viewBox="0 0 100 100" class="arbre tronc" style="left:'.$pickPossX.'%; bottom :'.(99- $baseHorizon).'%;">' ;

//require_once 'fonctions/getColor.php' ;

$startX = 48 ;
$startY = 96 ;

$startXDefs = 0 ;
$startYDefs = 0 ;

$saveValueX = array() ;
$saveValueY= array() ;

// COLORS 

$pickColorFeillage = getColor($colorFeillage, rand(-2,2)) ;




$pickColorTronc = getColor($colorTronc, rand(-2,2)) ;


//$svg .= '<rect x="0" y="0" width="500" height="500" fill="Cyan"/>';

$step = 0 ;

$saveSvg = '' ;

$saveFeuillage = '' ;

$backgroundFeuillage = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="0"
viewBox="0 0 100 100" class="vent'.rand(1,4).' arbre feuillage" style="left:'.$pickPossX.'%;bottom :'.(98- $baseHorizon).'%;">' ;
$tableSave = array() ;



for ($nTige = 0; $nTige <8; $nTige++) {
	$pickFleur = $nTige + 1 ;




	if ($nTige == 0){

		$destinationX = rand(0,20) ;
		$destinationY = rand(-60,-70) ;
	} else {

		if ($step <=2){
			$destinationX = rand(30,-24) ;
			$destinationY = rand(-20 + 2 * $step,4)   ;

		} else {
			$destinationX = rand(8,-8) ;
			$destinationY = rand(8,-8)   ;

		}


	}

	$multx1 = rand(0,15) / 15 ;
	$multy1 = rand(2,8) / 15 ; ;

	$multx2 = rand(0,15) / 15 ;
	$multy2 = rand(2,8) / 15 ; ;

	$calc1 = $startX + ( $destinationX * $multx1 );
	$calc2 = $startY + ( $destinationY * $multy1 );


	$calc3 = $startX + ( $destinationX * $multx2 ) ;
	$calc4 = $startY + ( $destinationY * $multy2 ) ;

	$pointfeuille2X = $calc1 - ( ($calc1 - $calc3) / 2) ;
	$pointfeuille2Y = $calc2 - ( ($calc2 - $calc4) / 2) ;


	if ($calc1 < $startX) {
		$rotate = rand(-14,-8) ;
	} else {
		$rotate = rand(14,8) ;
	}




	//require 'feuille.php';


	require 'tige.php';

/*
$startXDefs = 100 ;
$i = 0 ;
$startYDefs = 100 ;

$svg .= '<path d="M '.$startXDefs.','.$startYDefs.'
c '.$axeX.','.$axeY.' '.$axeX2.','.$axeY2.' 0,'.$variaArriveY.'
M '.$startXDefs.','.$startYDefs.'
c '.($axeX * -1).','.($axeY).' '.($axeX2 * -1).','.($axeY2).' 0,'.$variaArriveY.'
z" fill="rgb('.$color[0].','.$color[1].','.$color[2].')" stroke-width="1" transform="rotate('.($i * ($degreTour * $variaRotatePetale)).' '.$startXDefs.','.$startYDefs.')"/>' ;

*/


for ($f=0; $f < 3; $f++) { 

	require 'feuillage.php' ;

} 



$pickKey = array_rand($tableSave) ;

$step = $tableSave[$pickKey]['step'] + 1 ;

$startX = $tableSave[$pickKey]['stratX'] ;
$startY = $tableSave[$pickKey]['stratY'] ;

$finalX = $tableSave[$pickKey]['finalX'] ;
$finalY = $tableSave[$pickKey]['finalY'] ;




}

/*
$minX = min($saveValueX) ;
$maxX = max($saveValueX) ;

$minY = min($saveValueY) ;
$maxY = max($saveValueY) ;

$backgroundFeuillage .= ' <ellipse cx="'.( ($minX + $maxX) / 2).'" cy="'.( ($minY + $maxY) / 2).'" rx="'.(($maxX - $minX) / 1.8).'" ry="'.(($maxY - $minY) / 2).'"' ;

$backgroundFeuillage .= 'stroke="rgb('.$pickColorFeuille[0].','.$pickColorFeuille[1].','.$pickColorFeuille[2].')"
fill="rgb('.$pickColorFeuille[0].','.$pickColorFeuille[1].','.$pickColorFeuille[2].')"
stroke-width="10"'
;



$backgroundFeuillage .= '"></ellipse>' ;
*/

$svg .= $saveSvg ;
$svg .= $saveFeuillage ;

$svg .= "</svg>";





$backgroundFeuillage .= '</svg>' ;




//file_put_contents("../images/arbres/".rand(1,40).".svg", $svg) ;

echo  $backgroundFeuillage.$svg ;


?>