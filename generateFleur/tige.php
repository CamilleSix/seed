<?php 

//echo '<rect x="500" y="900" width="10" height="10" fill="Red"/>';

$svg .= '<path d="M '.$startX.' '.$startY.' ' ;



$svg .= 'c '.($destinationX * $multx1).','.($destinationY * $multy1).' '.($destinationX * $multx2).','.($destinationY * $multy2).' '.$destinationX.','.$destinationY.' ' ;


$svg .= ' " stroke="rgb('.$colorTige[$pickModele][0].','.$colorTige[$pickModele][1].','.$colorTige[$pickModele][2].')" stroke-width="'.(4 - $pickFleur * 0.4).'" fill="transparent"/>' ;



/*
$svg .= '<rect x="'.($startX + ( $destinationX * $multx1 ) ).'" y="'.($startY + ($destinationY * $multy1 ) ).'" width="10" height="10" fill="Green"/>';



$svg .= '<rect x="'.($startX + ( $destinationX * $multx2 ) ).'" y="'.($startY + ($destinationY * $multy2 ) ).'" width="10" height="10" fill="Orange"/>';





$svg .= '<rect x="'. ( $pointfeuille2X ).'" y="'.($pointfeuille2Y ).'" width="10" height="10" fill="Yellow"/>';
*/

?>