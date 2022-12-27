<?php 

//echo '<rect x="500" y="900" width="10" height="10" fill="Red"/>';


$saveSvg .= '<path d="M '.$startX.' '.$startY.' ' ;

if ($nTige == 0){
	$finalX = $startX + rand(8,16)  ;
	$finalY = $startY  ; 
	$moreX = rand(8,16) ;
	$moreY = rand(4,6) ;

} else {
	$moreX = abs($destinationX / 10) ;
	$moreY = abs($destinationY / 8) ;
}

$saveSvg .= 'c '.($destinationX * $multx1).','.($destinationY * $multy1).' '.($destinationX * $multx2).','.($destinationY * $multy2).' '.$destinationX.','.$destinationY.' 
C '.( $startX +  $destinationX * $multx2 + $moreX).','.($startY - $destinationY * $multy2 * -1 + $moreY).' '.($startX + $destinationX * $multx1+ $moreX).','.($startY - $destinationY * $multy1 * -1 + $moreY).' '.$finalX.','.$finalY.'
' ;


$saveSvg .= ' " stroke="rgb('.$pickColorTronc[0].','.$pickColorTronc[1].','.$pickColorTronc[2].')" stroke-linejoin="arcs"  stroke-width="2" fill="rgb('.$pickColorTronc[0].','.$pickColorTronc[1].','.$pickColorTronc[2].')"/>' ;

$xVert = $startX + $destinationX * $multx1 ;
$yVert = $startY + $destinationY * $multy1 ;

$xOrange = $startX + $destinationX * $multx2 ;
$yOrange = $startY + $destinationY * $multy2 ;



if ($step <= 1){


	for ($i=0; $i < 10; $i++) { 


		$pick = 19 - $i ;
		
		$t = $pick / 20 ;

		$kikiX = pow(1-$t,3) * $startX + (3 * $t) * pow(1-$t,2) * $xVert + 3 * pow($t,2) * (1-$t) * $xOrange + pow($t,3) * ($startX + $destinationX ) ;
		$kikiY = pow(1-$t,3) * $startY +  (3 * $t) * pow(1-$t,2) * $yVert +  3 * pow($t,2) * (1-$t) * $yOrange + pow($t,3) * ($startY + $destinationY ) ;


		$t = ($pick - 1) / 20 ;

		$kikiX2 = pow(1-$t,3) * $startX + (3 * $t) * pow(1-$t,2) * $xVert + 3 * pow($t,2) * (1-$t) * $xOrange + pow($t,3) * ($startX + $destinationX ) ;
		$kikiY2 = pow(1-$t,3) * $startY +  (3 * $t) * pow(1-$t,2) * $yVert +  3 * pow($t,2) * (1-$t) * $yOrange + pow($t,3) * ($startY + $destinationY ) ;


		$tableSave[$kikiX.'-'.$kikiY]['step'] =  $step + 1 ;

		$tableSave[$kikiX.'-'.$kikiY]['stratX'] =  $kikiX ;
		$tableSave[$kikiX.'-'.$kikiY]['stratY'] =  $kikiY ;

		$tableSave[$kikiX.'-'.$kikiY]['finalX'] =  $kikiX2 ;
		$tableSave[$kikiX.'-'.$kikiY]['finalY'] =  $kikiY2 ;


	}

}
	//$svg .= '<rect x="'.($finalX).'" y="'.($finalY).'" width="10" height="10" fill="Green"/>';




/*
$svg .= '<rect x="'.($startX + ( $destinationX * $multx1 ) ).'" y="'.($startY + ($destinationY * $multy1 ) ).'" width="10" height="10" fill="Green"/>';



$svg .= '<rect x="'.($startX + ( $destinationX * $multx2 ) ).'" y="'.($startY + ($destinationY * $multy2 ) ).'" width="10" height="10" fill="Orange"/>';





$svg .= '<rect x="'. ( $pointfeuille2X ).'" y="'.($pointfeuille2Y ).'" width="10" height="10" fill="Yellow"/>';
*/

?>