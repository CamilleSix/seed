<?php 
/*
echo '<rect x="'.($startX + $axeX).'" y="'.($startY + $axeY ).'" width="10" height="10" fill="Purple"/>';
echo '<rect x="'.($startX + $axeX2).'" y="'.($startY + $axeY2 ).'" width="10" height="10" fill="Magenta"/>';*/




$xOrange = ($startX + ( $destinationX * $multx2 ) ) ;
$yOrange = ($startY + ($destinationY * $multy2 ) ) ;

$xVert = ($startX + ( $destinationX * $multx1 ) ) ;
$yVert = ($startY + ($destinationY * $multy1 ) ) ;

for ($i=0; $i < 3; $i++) { 


	$t = rand(5,15) / 20 ;

	$kikiX = pow(1-$t,3) * $startX + (3 * $t) * pow(1-$t,2) * $xVert + 3 * pow($t,2) * (1-$t) * $xOrange + pow($t,3) * ($startX + $destinationX ) ;
	$kikiY = pow(1-$t,3) * $startY +  (3 * $t) * pow(1-$t,2) * $yVert +  3 * pow($t,2) * (1-$t) * $yOrange + pow($t,3) * ($startY + $destinationY ) ;

//$svg .= '<rect x="'. ( $kikiX ).'" y="'.($kikiY ).'" width="10" height="10" fill="Purple"/>';

	for ($f=0; $i < rand(0,2) ; $f++) { 

		$color = getColor($colorFeuille[$pickModele], rand(-3,3)) ;

		if ($rotate <0){
			$rotateFinal = $rotate + rand(0,-500) / 10 ;
		} else {
			$rotateFinal = $rotate + rand(0,500) / 10 ;	
		}

		if ($f > 0 && rand(1,2) == 1){
			$rotateFinal *= -1 ;
		}

		$svg .= '<use xlink:href="#feuille'.rand(2,4).'modele'.$pickModele.'"
		x="'.$kikiX.'" y="'.$kikiY.'" 
		transform="rotate('.$rotateFinal.' '.$kikiX.','.$kikiY.')"
		fill="rgb('.$color[0].','.$color[1].','.$color[2].')" />';
	}


	

}


	$t = 1 / 20 ;

	$kikiX = pow(1-$t,3) * $startX + (3 * $t) * pow(1-$t,2) * $xVert + 3 * pow($t,2) * (1-$t) * $xOrange + pow($t,3) * ($startX + $destinationX ) ;
	$kikiY = pow(1-$t,3) * $startY +  (3 * $t) * pow(1-$t,2) * $yVert +  3 * pow($t,2) * (1-$t) * $yOrange + pow($t,3) * ($startY + $destinationY ) ;



for ($i=0; $i < rand(1,3) ; $i++) { 

	$color = getColor($colorFeuille[$pickModele], rand(-2,2)) ;

	$rotateFinal = $rotate + rand(-10,10) ;


	if ($i > 0 && rand(1,2) == 1){
		$rotateFinal *= -1 ;
	}


	$svg .= '<use xlink:href="#feuille1modele'.$pickModele.'"
	x="'.$kikiX.'" y="'.$kikiY.'" 
	transform="rotate('.($rotateFinal * -1).'  '.$kikiX.','.$kikiY.')"
	fill="rgb('.$color[0].','.$color[1].','.$color[2].')" />';

}

?>