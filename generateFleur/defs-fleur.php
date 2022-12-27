<?php 
$axeX = rand(4,14) ;
$axeY = rand(-20,0) ;

$axeX2 = rand(4,14) ;
$axeY2 = rand(-24,-4) ;

$arriveY = rand(-12,-30) ;

if (abs($axeY - $axeY2) > 7){
	$axeY2 = $axeY * 0.8;
}

$nPetale = rand(5, 15) ;
$degreTour = 360 / $nPetale ;

$div = rand(2,10) ;


$multFleur = array(1, 1.5, 1.75,2) ;

foreach ($multFleur as $key => $multFleur) {


	$svg .= '<g id="fleur'.($key + 1).'modele'.$m.'">' ;


	for ($i=0; $i < $nPetale; $i++) { 

		$variaArriveY = $arriveY + rand(-10,10) / 5;

		$color = getColor($colorFleur[$m], rand(-2,2)) ;
		$variaRotatePetale = rand(90,110) / 100 ;

		$svg .= '<path d="M '.$startXDefs.','.$startYDefs.'
		c '.round($axeX / $multFleur,2).','.round($axeY/ $multFleur,2).' '.round($axeX2/ $multFleur,2).','.round($axeY2/ $multFleur,2).' 0,'.round($variaArriveY/ $multFleur,2).'
		M '.$startXDefs.','.$startYDefs.'
		c '.round($axeX * -1 / $multFleur,2).','.round($axeY / $multFleur,2).' '.round($axeX2 * -1 / $multFleur,2).','.round($axeY2/ $multFleur,2).' 0,'.round($variaArriveY/ $multFleur,2).'
		z" fill="rgb('.$color[0].','.$color[1].','.$color[2].')" stroke-width="1" transform="rotate('.($i * ($degreTour * $variaRotatePetale)).' '.$startXDefs.','.$startYDefs.')"/>' ;

	}

	$svg .= '<circle cx="'.$startXDefs.'" cy="'.$startYDefs.'" r="'.round(abs($arriveY / $div / $multFleur),2).'" fill="rgb('.$colorCoeurFleur[$m][0].','.$colorCoeurFleur[$m][1].','.$colorCoeurFleur[$m][2].')"/>';
	$coeurFonce = getColor($colorCoeurFleur[$m],2) ;
	$svg .= '<circle cx="'.$startXDefs.'" cy="'.$startYDefs.'" r="'.round(abs($arriveY / ($div * 3)/ $multFleur)).'" fill="rgb('.$coeurFonce[0].','.$coeurFonce[1].','.$coeurFonce[2].')"/>';

	$svg .= '</g>' ;



	$svg .= '<g id="fleur'.($key + 1).'modele'.$m.'demi">' ;

	$angleModifDemi = rand(-120,30) ;

	$svg .= '<circle cx="'.$startXDefs.'" cy="'.$startYDefs.'" r="'.round(abs($arriveY/ 6 / $multFleur)).'" fill="rgb('.$colorTige[$m][0].','.$colorTige[$m][1].','.$colorTige[$m][2].')"/>';

	$nPetaleDemi = ceil($nPetale / 1.5) ;
	for ($i=0; $i < $nPetaleDemi; $i++) { 

		$variaArriveY = $arriveY + rand(-10,10) ;

		$color = getColor($colorFleur[$m], rand(-2,2)) ;
		$variaRotatePetale = rand(90,110) / 100 ;

		$svg .= '<path d="M '.$startXDefs.','.$startYDefs.'
		c '.round($axeX / $multFleur,2).','.round($axeY/ $multFleur,2).' '.round($axeX2/ $multFleur,2).','.round($axeY2/ $multFleur,2).' 0,'.round($variaArriveY/ $multFleur,2).'
		M '.$startXDefs.','.$startYDefs.'
		c '.round($axeX * -1 / $multFleur,2).','.round($axeY / $multFleur,2).' '.round($axeX2 * -1 / $multFleur,2).','.round($axeY2/ $multFleur,2).' 0,'.round($variaArriveY/ $multFleur,2).'
		z" fill="rgb('.$color[0].','.$color[1].','.$color[2].')" stroke-width="1" transform="rotate('.($i * ($degreTour / 2* $variaRotatePetale) + $angleModifDemi).' '.$startXDefs.','.$startYDefs.')"/>' ;

	}


	$svg .= '</g>' ;



	$svg .= '<g id="fleur'.($key + 1).'modele'.$m.'bourgeon">' ;

	$angleModifDemi = rand(-100,70) ;

	$svg .= '<circle cx="'.$startXDefs.'" cy="'.$startYDefs.'" r="'.round((4 - ($key + 1) * 0.4) / 2,2).'" fill="rgb('.$colorTige[$m][0].','.$colorTige[$m][1].','.$colorTige[$m][2].')"/>';

	$nPetaleDemi = ceil($nPetale / 3.5) ;
	for ($i=0; $i < $nPetaleDemi; $i++) { 

		$variaArriveY = $arriveY + rand(-10,10) ;

		$color = getColor($colorFleur[$m], rand(-2,2)) ;
		$variaRotatePetale = rand(90,110) / 150 ;

		$svg .= '<path d="M '.$startXDefs.','.$startYDefs.'
		c '.round($axeX / $multFleur,2).','.round($axeY/ $multFleur,2).' '.round($axeX2/ $multFleur,2).','.round($axeY2/ $multFleur,2).' 0,'.round($variaArriveY/ $multFleur,2).'
		M '.$startXDefs.','.$startYDefs.'
		c '.round($axeX * -1 / $multFleur,2).','.round($axeY / $multFleur,2).' '.round($axeX2 * -1 / $multFleur,2).','.round($axeY2/ $multFleur,2).' 0,'.round($variaArriveY/ $multFleur,2).'
		z" fill="rgb('.$color[0].','.$color[1].','.$color[2].')" stroke-width="1" transform="rotate('.round($i * ($degreTour / 4* $variaRotatePetale) + $angleModifDemi,2).' '.$startXDefs.','.$startYDefs.')"/>' ;

	}

	$multFleur *= 1.5 ;

	$svg .= '<path d="M '.$startXDefs.','.$startYDefs.'
	c '.round($axeX / $multFleur,2).','.round($axeY/ $multFleur,2).' '.round($axeX2/ $multFleur,2).','.round($axeY2/ $multFleur,2).' 0,'.round($variaArriveY/ $multFleur,2).'
	M '.$startXDefs.','.$startYDefs.'
	c '.round($axeX * -1 / $multFleur,2).','.round($axeY / $multFleur,2).' '.round($axeX2 * -1 / $multFleur,2).','.round($axeY2/ $multFleur,2).' 0,'.round($variaArriveY/ $multFleur,2).'
	z" fill="rgb('.$colorTige[$m][0].','.$colorTige[$m][1].','.$colorTige[$m][2].')" stroke-width="1" transform="rotate('.round($i * ($degreTour / 4) + $angleModifDemi + 10, 2).' '.$startXDefs.','.$startYDefs.')"/>' ;


	$svg .= '<path d="M '.$startXDefs.','.$startYDefs.'
	c '.round($axeX / $multFleur,2).','.round($axeY/ $multFleur,2).' '.round($axeX2/ $multFleur,2).','.round($axeY2/ $multFleur,2).' 0,'.round($variaArriveY/ $multFleur,2).'
	M '.$startXDefs.','.$startYDefs.'
	c '.round($axeX * -1 / $multFleur,2).','.round($axeY / $multFleur,2).' '.round($axeX2 * -1 / $multFleur,2).','.round($axeY2/ $multFleur,2).' 0,'.round($variaArriveY/ $multFleur,2).'
	z" fill="rgb('.$colorTige[$m][0].','.$colorTige[$m][1].','.$colorTige[$m][2].')" stroke-width="1" transform="rotate('.($i * ($degreTour / 4) + $angleModifDemi - 50).' '.$startXDefs.','.$startYDefs.')"/>' ;


	$svg .= '</g>' ;

}




?>