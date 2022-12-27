<?php function createCils($startX, $nCils , $possX, $possY, $angleRotate ) {


	$svg = '<use xlink:href="#cils'.$nCils.'"
	x="'.($startX + $possX).'" y="'.($possY ).'" transform="rotate('.($angleRotate).' '.($startX + $possX).' '.($possY).' )" />';

if ($nCils == 4){
	$varia = '' ;
} else {
	$varia = '' ;
}



	$svg .= '<use xlink:href="#cils'.$nCils.$varia.'"
	x="'.($startX + $possX * -1).'" y="'.($possY ).'" transform="rotate('.($angleRotate * -1).' '.($startX + $possX * -1).' '.($possY ).' )" />';

	return $svg ;
} ?>