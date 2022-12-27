<?php 
$axeX = rand(20,60) ;
$axeY = rand(-80,0) ;

$axeX2 = rand(20,60) ;
$axeY2 = rand(-80,0) ;

$arriveY = rand(-50,-150) ;

$startXDefs  = 0 ;
$startYDefs = 0 ;


if (abs($axeY - $axeY2) > 35){
	$axeY2 = $axeY * 0.8 ;
}


$colorOreilleMotif = 'rgb('.$colorPeau[0].','.$colorPeau[1].','.$colorPeau[2].')' ;


$svg .= '<g id="oreille">
<path d="M '.($startXDefs).','.($startYDefs).'
c '.$axeX.','.$axeY.' '.$axeX2.','.$axeY2.' 0,'.$arriveY.'
C '.(($startXDefs - $axeX2) ).','.(($startXDefs + $axeY2) ).' '.( ($startXDefs - $axeX) ).','.(($startYDefs +$axeY )).' '.($startXDefs).','.($startYDefs).' z
" stroke="'.$colorOreilleMotif.'" stroke-width="15" fill="rgb('.$colorOreille[0].','.$colorOreille[1].','.$colorOreille[2].')"/>
</g>
';




?>