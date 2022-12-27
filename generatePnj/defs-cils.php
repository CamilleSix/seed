<?php 

//CILS 
$longueurCils = rand(6,12) ;

$svg .=   '<g id="cils1">
<line x1="'.($startXDefs - $longueurCils / 2).'" y1="'.($startYDefs).'" 
x2="'.($startXDefs - $longueurCils).'" y2="'.($startYDefs - $longueurCils).'" fill="red" stroke-width="2" stroke="#262626" />' ;


$svg .=   '
<line x1="'.($startXDefs).'" y1="'.($startYDefs ).'" 
x2="'.($startXDefs).'" y2="'.($startYDefs - $longueurCils * 1.5).'" fill="red" stroke-width="2" stroke="#262626" />' ;


$svg .=   '
<line x1="'.($startXDefs + $longueurCils / 2).'" y1="'.($startYDefs ).'" 
x2="'.($startXDefs + $longueurCils).'" y2="'.($startYDefs - $longueurCils).'" fill="red" stroke-width="2" stroke="#262626" />
</g>' ;



$svg .=   '<g id="cils2">
<line x1="'.($startXDefs).'" y1="'.($startYDefs).'" 
x2="'.($startXDefs - $longueurCils).'" y2="'.($startYDefs - $longueurCils).'" fill="red" stroke-width="2" stroke="#262626" />' ;


$svg .=   '
<line x1="'.($startXDefs).'" y1="'.($startYDefs ).'" 
x2="'.($startXDefs).'" y2="'.($startYDefs - $longueurCils * 1.5).'" fill="red" stroke-width="2" stroke="#262626" />' ;


$svg .=   '
<line e x1="'.($startXDefs).'" y1="'.($startYDefs ).'" 
x2="'.($startXDefs + $longueurCils).'" y2="'.($startYDefs - $longueurCils).'" fill="red" stroke-width="2" stroke="#262626" />
</g>' ;


$svg .=   '<g id="cils3">
<line x1="'.($startXDefs - $longueurCils / 2).'" y1="'.($startYDefs).'" 
x2="'.($startXDefs - $longueurCils / 2).'" y2="'.($startYDefs - $longueurCils).'" fill="red" stroke-width="2" stroke="#262626" />' ;


$svg .=   '
<line x1="'.($startXDefs).'" y1="'.($startYDefs ).'" 
x2="'.($startXDefs).'" y2="'.($startYDefs - $longueurCils ).'" fill="red" stroke-width="2" stroke="#262626" />' ;


$svg .=   '
<line x1="'.($startXDefs + $longueurCils / 2).'" y1="'.($startYDefs ).'" 
x2="'.($startXDefs + $longueurCils / 2).'" y2="'.($startYDefs - $longueurCils).'" fill="red" stroke-width="2" stroke="#262626" />
</g>' ;



$svg .=   '<g id="cils4">

<path d="
M '.($startXDefs).' '.($startYDefs).' 
l -'.( $longueurCils / 2).' 0 
l '.( $longueurCils / 2).' -'.($longueurCils * 1.2).' 
l '.( $longueurCils / 2).' '.($longueurCils * 1.2).' 
z" fill="#262626" stroke="#262626" stroke-width="2" />' ;

$svg .=   '
</g>' ;

$svg .=   '<g id="cils4s">

<polygon points="
'.($startXDefs + $longueurCils / 3).','.($startYDefs + $longueurCils * 1.5).' 

'.($startXDefs ).','.($startYDefs / 1.5).' 
'.($startXDefs + $longueurCils / 1.5).','.($startYDefs).'" 
fill="#262626" stroke-width="2" stroke="#262626" />' ;
$svg .=   '
</g>' ;
?>