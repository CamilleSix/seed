<?php 
$pickPossX = rand(0,80) ;

$svg = '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0" y="0"
viewBox="0 0 100 100" class="fleur" style="left:'.$pickPossX.'%; bottom :'.(99.5- $baseHorizon).'%;">' ;


$startX = 48 ;
$startY = 96 ;

$startXDefs = 0 ;
$startYDefs = 0 ;
$tableForme = array ('', 'demi', 'bourgeon') ;


if (empty($origine)) {

	$fl = 0 ;
	require_once '../fonctions/getColor.php' ;

	$colorFeuille[] = rand(50,200); $colorFeuille[] = rand(50,200); $colorFeuille[] = rand(50,200) ;

	$colorTige[] = rand(50,200); $colorTige[] = rand(50,200); $colorTige[] = rand(50,200) ;

	$colorFleur[] = rand(50,200); $colorFleur[] = rand(50,200); $colorFleur[] = rand(50,200) ;
	$colorCoeurFleur[] = rand(0,250); $colorCoeurFleur[] = rand(0,250); $colorCoeurFleur[] = rand(0,250) ;

}
else {


}


if ($fl == 0) {


	$svg .= "<defs>" ;
	for ($m=1; $m <= $nombreModeleFleur; $m++) { 

		require 'defs-feuille.php';
		require 'defs-fleur.php';

	}
	$svg .= "</defs>" ;
}


//$svg .= '<rect x="0" y="0" width="500" height="500" fill="Cyan"/>';
$pickModele = rand(1,$nombreModeleFleur) ;


for ($nTige = 0; $nTige < rand(1,4); $nTige++) {
	$pickFleur = $nTige + 1 ;

	if ($nTige == 0){

		$destinationX = rand(-12,12) ;
		$destinationY = rand(-60,-80) ;
	} else {

		$startX += rand(-10,10) ;
		$destinationX = rand(-20,20) ;
		$destinationY = rand(-20,-70) ;
	}

	$multx1 = rand(-15,15) / 15 ;
	$multy1 = rand(2,8) / 10 ; ;

	$multx2 = rand(-15,15) / 15 ;
	$multy2 = rand(2,8) / 10 ; ;

	$calc1 = $startX + ( $destinationX * $multx1 );
	$calc2 = $startY + ( $destinationY * $multy1 );


	$calc3 = $startX + ( $destinationX * $multx2 ) ;
	$calc4 = $startY + ( $destinationY * $multy2 ) ;

	$pointfeuille2X = $calc1 - ( ($calc1 - $calc3) / 2) ;
	$pointfeuille2Y = $calc2 - ( ($calc2 - $calc4) / 2) ;


	if ($calc1 < $startX) {
		$rotate = rand(-70,-40) ;
	} else {
		$rotate = rand(70,40) ;
	}



	require 'feuille.php';


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

$svg .= '<use xlink:href="#fleur'.$pickFleur.'modele'.$pickModele.$tableForme[array_rand($tableForme)].'"
x="'.($startX + $destinationX).'" y="'.($startY +$destinationY).'" 
transform="rotate('.rand(-40,60).' '.($startX + $destinationX).' '.($startY +$destinationY).')"/>';

}
$svg .= "</svg>";





//file_put_contents("../images/fleurs/".rand(1,40).".svg", $svg) ;

echo $svg ;

?>