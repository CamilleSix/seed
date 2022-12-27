<?php 
$axeX = rand(4,14) ;
$axeY = rand(-20,0) ;

$axeX2 = rand(4,14) ;
$axeY2 = rand(-24,-4) ;

$arriveY = rand(-12,-30) ;



if (abs($axeY - $axeY2) > 7){
	$axeY2 = $axeY * 0.8;
}



$multFeuille = array(1, 1.5, 2,2.5) ;

foreach ($multFeuille as $key => $multFeuille) {


	$svg .= '<g id="feuille'.($key + 1).'modele'.$m.'">' ;



	$svg .= '
	<path d="M '.$startXDefs.','.$startYDefs.'
	c '.round($axeX / $multFeuille, 2).','.round($axeY /$multFeuille, 2).' '.round($axeX2 /$multFeuille,2).','.round($axeY2 /$multFeuille, 2).' 0,'.round($arriveY /$multFeuille,2).'
	M '.$startXDefs.','.$startYDefs.'
	c '.round($axeX * -1 / $multFeuille,2).','.round($axeY / $multFeuille,2).' '.round($axeX2 * -1 / $multFeuille,2).','.round($axeY2 / $multFeuille,2).' 0,'.round($arriveY /$multFeuille,2).'
	z" stroke="#85e085" stroke-width="0"/>
	<polygon points="-0.6 0.6, 0,'.round($arriveY * 0.7 / $multFeuille,2).', 0.6 0.6" stroke="rgb('.$colorTige[$m][0].','.$colorTige[$m][1].','.$colorTige[$m][2].')" stroke-width="0.3" fill="rgb('.$colorTige[$m][0].','.$colorTige[$m][1].','.$colorTige[$m][2].')"/>
	</g>';

}


?>