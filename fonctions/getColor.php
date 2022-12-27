<?php 
function getColor($baseColor = array(), $modifStep = 0){

// modifStep = inférieur à 0 -> Plus sombre, suppérieur à 0 -> Plus clair

	if (!empty($baseColor)){
		$r = $baseColor[0];
		$g = $baseColor[1];
		$b = $baseColor[2];

	} else {
		$r = rand(50,255) ;
		$g = rand(50,255) ;
		$b = rand(50,255) ;
	}

	if (!empty($modifStep)){
		$r = $r + $modifStep * 10 ;
		$g = $g + $modifStep * 10 ;
		$b = $b + $modifStep * 10 ;

		if ($r > 255){
			$r = 255 ;
		} elseif ($r < 0) {
			$r = 0 ;
		}

		if ($g > 255){
			$g = 255 ;
		} elseif ($g < 0) {
			$g = 0 ;
		}

		if ($b > 255){
			$b = 255 ;
		} elseif ($b < 0) {
			$b = 0 ;
		}

	}

	$color[0] = $r ;
	$color[1] = $g ;
	$color[2] = $b ;

	return $color ;
}

?>