<?php $svg = '<?xml version="1.0" encoding="iso-8859-1"?>
<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
viewBox="0 0 500 500" xml:space="preserve">' ;

require_once '../fonctions/getColor.php' ;
require_once '../fonctions/createCils.php' ;

$startX = 240 ;
$startY = 220 ;

$startXDefs = 0 ;
$startYDefs = 0 ;


// COLORS 

$colorPeau[] = rand(50,250); $colorPeau[] = rand(50,250); $colorPeau[] = rand(50,250) ;
$colorOreille[] = rand(50,200); $colorOreille[] = rand(50,200); $colorOreille[] = rand(50,200) ;
$colorJoue[] = rand(100,255); $colorJoue[] = rand(0,$colorJoue[0] - 50); $colorJoue[] = rand($colorJoue[1],$colorJoue[0]) ;
$colorYeux[] = rand(0,200); $colorYeux[] = rand(0,200); $colorYeux[] = rand(0,200) ;


$taches = rand(1,2) ;

$svg .= '<defs>
<filter id="blushJoue" x="-20%" y="-20%" width="150%" height="150%">
<feGaussianBlur in="SourceGraphic" stdDeviation="1" />
</filter>' ;

if ($taches == 1){
	$colorTache = getColor() ;

	$svg .= '
	<filter id="taches">

	<feTurbulence type="fractalNoise" baseFrequency=".02 .01" numOctaves="1"/>
	<feDisplacementMap in="SourceGraphic" scale="25"/>
	<feGaussianBlur result="blurOut" in="offOut" stdDeviation="1"/>

	</filter>
	' ;



	$svg .= '<pattern id="motifTaches" x="0" y="0" width="100%" height="100%">

	<rect x="0" y="0" width="500" height="500" fill="rgb('.$colorPeau[0].','.$colorPeau[1].','.$colorPeau[2].')"/>
	<g>

	'; 

	if (rand(1,2) == 1){

		for ($i=0; $i < 10 ; $i++) { 
			$colorChange = rand(-3,3) ;

			if ($colorChange ==0){
				$colorChange = 2 ;
			}
			$selectColorTache = getColor($colorPeau, $colorChange) ;

			$baseX = rand(-10,290) ; 
			$baseY = rand(-10,400) ; 


			$svg .= '<polygon 
			stroke="rgb('.$selectColorTache[0].','.$selectColorTache[1].','.$selectColorTache[2].')"
			fill="rgb('.$selectColorTache[0].','.$selectColorTache[1].','.$selectColorTache[2].')"
			stroke-width="'.rand(20,100).'"
			stroke-linejoin="round" 
			points="';

			$nPoint = rand(3,9);

			for ($n=0; $n < $nPoint ; $n++) { 

				$svg .=  $baseX += rand(-2,20) ;
				$svg .=  ",";

				$pick =  rand(-1,10) ;
				$svg .=  $baseY + $pick;

				$svg .=  " " ;
			} ;
			$svg .= '">


			</polygon>' ;
		}
	} else {

		for ($i=0; $i < 50 ; $i++) { 
			$colorChange = rand(-3,3) ;

			if ($colorChange ==0){
				$colorChange = 2 ;
			}
			$selectColorTache = getColor($colorPeau, $colorChange) ;

			$baseX = rand(-10,290) ; 
			$baseY = rand(-10,400) ; 


			$svg .= '<polygon 
			stroke="rgb('.$selectColorTache[0].','.$selectColorTache[1].','.$selectColorTache[2].')"
			fill="rgb('.$selectColorTache[0].','.$selectColorTache[1].','.$selectColorTache[2].')"
			stroke-width="'.rand(10,30).'"
			stroke-linejoin="round" 
			points="';

			$nPoint = rand(2,4);

			for ($n=0; $n < $nPoint ; $n++) { 

				$svg .=  $baseX += rand(-20,50) / 10 ;
				$svg .=  ",";

				$pick =  rand(-10,50) / 10 ;
				$svg .=  $baseY + $pick;

				$svg .=  " " ;
			} ;
			$svg .= '">


			</polygon>' ;
		}

	}
	

	$svg .='</g>

	</pattern>' ;

}



require_once 'defs-oreille.php';
require_once 'defs-cils.php';


$rayonVisageX = rand(70,80) ;
$rayonVisageY = rand(70,80) ;

$rayonMentonX = rand(round($rayonVisageX * 0.8 * 100),round($rayonVisageX * 1.2 * 100)) / 100 ;
$rayonMentonY = rand(50,70) ;

$positionMenton = $startY + $rayonVisageY / 3 + rand(-10,10);

$svg .= '<clipPath id="formeVisage">' ;


$svg .=  '<ellipse cx="'.$startX.'" cy="'.$startY.'" rx="'.$rayonVisageX.'" ry="'.$rayonVisageY.'"/>' ;

$svg .=  '<ellipse cx="'.$startX.'" cy="'.$positionMenton.'" rx="'.$rayonMentonX.'" ry="'.$rayonMentonY.'"/>' ;


$svg .= '</clipPath>' ;

$svg .= "</defs>" ;

$positionOreille = $startY - $rayonVisageY / 1.5  ;

if (rand(1,3) == 1){
	$referenceRotate = $startY ;
} else {
	$referenceRotate = $positionOreille ;

}

$pickOreille = rand(1,3);

if ($pickOreille == 1){
	$rotateOreille = rand(20,40) ;
	$decaleOreille = rand(0,-10);


} else if ($pickOreille == 2) {
	$rotateOreille = rand(0,10) ;
	$decaleOreille = rand(-30,$rayonVisageX * -0.5);
} else {
	$rotateOreille = rand(110,150) ;
	$decaleOreille = $rayonVisageX * -0.5;
	$positionOreille = $startY - rand(round($rayonVisageY*0.9), round($rayonVisageY *0.6) );
	$referenceRotate = $positionOreille ;

}

//$svg .= '<rect x="0" y="0" width="500" height="500" fill="Cyan"/>';


// OREILLE 

$svg .= '<g class="oreilles">' ;

$svg .= '<use xlink:href="#oreille"
x="'.($startX + $decaleOreille).'" y="'.($positionOreille ).'" transform="rotate('.($rotateOreille * -1).' '.($startX + $decaleOreille).' '.$referenceRotate.' )" '.($pickOreille == 3 ? ' stroke-linejoin="round"' : '' ).'/>';

$svg .= '<use xlink:href="#oreille"
x="'.($startX - $decaleOreille).'" y="'.($positionOreille).'" transform="rotate('.$rotateOreille.' '.($startX - $decaleOreille).' '.$referenceRotate.' )" '.($pickOreille == 3 ? ' stroke-linejoin="round"' : '' ).'/>';

if ($taches == 1) {
	$svg .= '</g>' ;
}

$svg .=   '<ellipse cx="'.$startX.'" cy="'.$startY.'" rx="'.$rayonVisageX.'" ry="'.$rayonVisageY.'" ';


$svg .= 'fill="rgb('.$colorPeau[0].','.$colorPeau[1].','.$colorPeau[2].')"' ;



$svg .= ' />' ;

//MENTON

$svg .=   '<ellipse cx="'.$startX.'" cy="'.$positionMenton.'" rx="'.$rayonMentonX.'" ry="'.$rayonMentonY.'"' ;


$svg .= 'fill="rgb('.$colorPeau[0].','.$colorPeau[1].','.$colorPeau[2].')"' ;



$svg .= ' stroke="transparent"/>' ;

if ($taches == 1){

	$svg .= '<rect x="0" y="0" width="500" height="500" fill="url(#motifTaches)" clip-path="url(#formeVisage)"/>' ;
//clip-path="url(#formeVisage)"
}

$positionContourBouche= $positionMenton + $rayonMentonY / 2 + rand(-15,5);
$rayonContourBoucheX = rand($rayonMentonX / 1.6, $rayonMentonX * 0.8 ) ;
$rayonContourBoucheY =  rand($rayonMentonY / 3, $rayonMentonY / 1.5) ;

// YEUX 


$destinationX = rand(20,30);
$destinationY = rand(1,4);

$multx1 = 0.5 ;
$multy1 = rand(5,15) / 10 * -1; 

$calc1 = $destinationX * $multx1;
$calc2 = ( $destinationY * $multy1 );

$positionYeux = $positionContourBouche - $rayonContourBoucheY - rand(15,30)   ;
$ecartYeux = rand(8,18) ;


$pickJoue = rand(1,3) ;

if ($pickJoue ==1){
	// JOUES

	$joueX = rand(10,30) ;
	$joueY = rand(round($joueX / 2),round($joueX * 1.2)) ;
	$ecartJoue = rand(round($rayonMentonX / 1.5)  , $rayonMentonX *1.2 ) ;
	$positionJoue = $positionYeux + $joueY + rand(5,25)   ;

	$svg .=   '<ellipse cx="'.($startX + $ecartJoue).'" cy="'.($positionJoue).'" rx="'.$joueX.'" ry="'.$joueY.'" fill="rgb('.$colorJoue[0].','.$colorJoue[1].','.$colorJoue[2].')" stroke="transparent" filter="url(#blushJoue)" opacity="0.8" clip-path="url(#formeVisage)" />' ;

	$svg .=   '<ellipse cx="'.($startX - $ecartJoue).'" cy="'.($positionJoue).'" rx="'.$joueX.'" ry="'.$joueY.'" fill="rgb('.$colorJoue[0].','.$colorJoue[1].','.$colorJoue[2].')" stroke="transparent" filter="url(#blushJoue)" opacity="0.8" clip-path="url(#formeVisage)" />' ;

} elseif ($pickJoue == 2) {

	$joueX = rand(2,3) ;
	$joueY = $joueX ;
	$ecartJoue = rand(round($rayonMentonX / 1.5)  , $rayonMentonX  ) ;
	$positionJoue = $positionYeux + $joueY + rand(10,25)   ;
	$rotateJoue = 0 ;

	$espacementPoint = rand(12,16) ;

	$svg .= '<g transform="rotate('.$rotateJoue.' '.($startX + $ecartJoue - $espacementPoint / 2).' '.($positionJoue + $espacementPoint / 2).' )" clip-path="url(#formeVisage)" >' ;

	$svg .=   '<ellipse cx="'.($startX + $ecartJoue).'" cy="'.($positionJoue).'" rx="'.$joueX.'" ry="'.$joueY.'" fill="rgb('.$colorJoue[0].','.$colorJoue[1].','.$colorJoue[2].')" stroke="transparent" />' ;

	$svg .=   '<ellipse cx="'.($startX + $ecartJoue - $espacementPoint).'" cy="'.($positionJoue).'" rx="'.$joueX.'" ry="'.$joueY.'" fill="rgb('.$colorJoue[0].','.$colorJoue[1].','.$colorJoue[2].')" stroke="transparent" />' ;

	$svg .=   '<ellipse cx="'.($startX + $ecartJoue - $espacementPoint / 2).'" cy="'.($positionJoue + $espacementPoint).'" rx="'.$joueX.'" ry="'.$joueY.'" fill="rgb('.$colorJoue[0].','.$colorJoue[1].','.$colorJoue[2].')" stroke="transparent"/>' ;

	$svg .= '</g>';


	
	$svg .= '<g transform="rotate('.($rotateJoue * -1).' '.($startX - $ecartJoue + $espacementPoint / 2).' '.($positionJoue + $espacementPoint / 2).' )"  clip-path="url(#formeVisage)" >' ;
	$svg .=   '<ellipse cx="'.($startX - $ecartJoue).'" cy="'.($positionJoue).'" rx="'.$joueX.'" ry="'.$joueY.'" fill="rgb('.$colorJoue[0].','.$colorJoue[1].','.$colorJoue[2].')" stroke="transparent"/>' ;

	$svg .=   '<ellipse cx="'.($startX - $ecartJoue + $espacementPoint).'" cy="'.($positionJoue).'" rx="'.$joueX.'" ry="'.$joueY.'" fill="rgb('.$colorJoue[0].','.$colorJoue[1].','.$colorJoue[2].')" stroke="transparent"  />' ;

	$svg .=   '<ellipse cx="'.($startX - $ecartJoue + $espacementPoint / 2).'" cy="'.($positionJoue + $espacementPoint).'" rx="'.$joueX.'" ry="'.$joueY.'" fill="rgb('.$colorJoue[0].','.$colorJoue[1].','.$colorJoue[2].')" stroke="transparent"/>' ;


	$svg .= '</g>';


}

$pickYeux = rand(1,3) ;

if ($pickYeux == 1){
// yeux plissés 
	$positionYeuxMax = $positionYeux ;

$pick = rand(1,3) ;
	if ($pick == 1) {

		$rotateCils = rand(5,15) ;

		$positionCils = rand(0,5);
		$possX = $ecartYeux + $destinationX / 2 + $positionCils ;
		$possY  = $positionYeux ;
		$nCils = 1 ;

	} elseif ($pick == 2) {

		$rotateCils = rand(5,30) ;

		$positionCils = rand(4,6);
		$possX = $ecartYeux + $destinationX / 2 + $positionCils;
		$possY  = $positionYeux ;
		$nCils = 3 ;

	} else {

		$rotateCils = rand(20,40) ;

		$positionCils = rand(4,6);
		$possX = $ecartYeux + $destinationX / 2 + $positionCils;
		$possY  = $positionYeux - 0.5 ;
		$nCils = 4 ;
	}

	$svg .= createCils($startX, $nCils , $possX, $possY, $rotateCils ) ;

	$svg .= '<path d="
	M '.($startX + $ecartYeux).','.($positionYeux).'
	q '.$calc1.','.$calc2.' '.($destinationX).','.($destinationY).'
	" 
	stroke-width="6" 
	stroke="black" fill="transparent"/>' ;

	$svg .= '<path d="
	M '.($startX - $ecartYeux).','.($positionYeux).'
	q '.($calc1 * -1).','.$calc2.' '.($destinationX * -1).','.($destinationY).'
	" 
	stroke-width="6" 
	stroke="black" fill="transparent"/>' ;

} else if ($pickYeux == 2) {

// yeux ronds noirs

	$yeuxRondY = rand(3,15) ;

	$yeuxRondX = rand(3,$yeuxRondY) ;

	$ecartYeuxRond = $ecartYeux * 2 ;

	$positionYeuxMax = $positionYeux - $yeuxRondY / 2  ;


	if ( ($yeuxRondY < $longueurCils * 1.5) || rand(1,2) == 1){


		$rotateCils = rand(-5,20) ;

		$positionCils = rand(0,5);

		$possX = $ecartYeuxRond ;
		$possY  = $positionYeux - $yeuxRondY / 2 ;
		$nCils = 2 ;



	} else {

		$rotateCils = rand(80,100) ;

		$positionCils = 0;

		$possX = $ecartYeuxRond + $yeuxRondX * 0.6  + $positionCils ;
		$possY  = $positionYeux - $yeuxRondY * rand(-5,5) / 10 ;

		$pick= rand(2,4) ;

		if ($pick ==2){
			$nCils = 1 ;
		} else {
			$nCils = $pick ;
		}

	}

	$svg .= createCils($startX, $nCils , $possX, $possY, $rotateCils ) ;


	$svg .=   '<ellipse cx="'.($startX + $ecartYeuxRond).'" cy="'.($positionYeux).'" rx="'.$yeuxRondX.'" ry="'.$yeuxRondY.'" fill="black" stroke="transparent"/>' ;

	$svg .=   '<ellipse cx="'.($startX - $ecartYeuxRond).'" cy="'.($positionYeux).'" rx="'.$yeuxRondX.'" ry="'.$yeuxRondY.'" fill="black" stroke="transparent"/>' ;


} else {

	$yeuxRondX = rand(5,15) ;
	$yeuxRondY = rand(round($yeuxRondX),round($yeuxRondX * 2)) ;
	$ecartYeuxRond = $ecartYeux + $yeuxRondX ;

	$positionYeuxMax = $positionYeux - $yeuxRondY / 2  ;

	$positionPupilleX = rand(round($yeuxRondX * -0.6) , round($yeuxRondX * 0.6) ) ;
	$positionPupilleY = rand(round($yeuxRondY * -0.5) , round($yeuxRondY * 0.5) ) ;

	if (rand(1,2) ==1) {
		$tailleContour = 3 ;
		$couleurContour = '#f2f2f2' ;
		$couleurPupille = 'rgb('.$colorYeux[0].','.$colorYeux[1].','.$colorYeux[2].')' ;
		$couleurFondOeil = 'rgb(255,255,255)' ;
		$taillePupilleX = rand(3,round($yeuxRondX * 0.8)) ;
		$taillePupilleY = $taillePupilleX + round(rand(-10,10) / 15);

	} else {
		$taillePupilleX = rand(8,24) ;
		$taillePupilleY = $taillePupilleX + rand(-10,10) / 10;
		$tailleContour = 1 ;
		$couleurContour = 'Gainsboro' ;
		$couleurPupille =  'rgb(255,255,255)' ;
		$couleurFondOeil = 'rgb('.$colorYeux[0].','.$colorYeux[1].','.$colorYeux[2].')' ;
	}

	if ( rand(1,2) == 1){


		$rotateCils = rand(-5,20) ;

		$positionCils = rand(0,5);

		$possX = $ecartYeuxRond + $tailleContour ;
		$possY  = $positionYeux - $yeuxRondY / 2 - $tailleContour ;
		$nCils = 1 ;



	} else {

		$rotateCils = rand(80,100) ;

		$positionCils = 0;

		$possX = $ecartYeuxRond + $yeuxRondX * 0.6  + $positionCils + $tailleContour ;
		$possY  = $positionYeux - $yeuxRondY * rand(-1,1) / 10 - $tailleContour ;

		$pick= rand(2,4) ;
		
		if ($pick ==2){
			$nCils = 1 ;
		} else {
			$nCils = $pick ;
		}

	}

	$svg .= createCils($startX, $nCils , $possX, $possY, $rotateCils ) ;





	$svg .= '<clipPath id="yeux" geometry-box="fill-box">' ;
	$svg .=   '<ellipse cx="'.($startX + $ecartYeuxRond).'" cy="'.($positionYeux).'" rx="'.($yeuxRondX - $tailleContour /2).'" ry="'.($yeuxRondY - $tailleContour/2).'"/>' ;

	$svg .=   '<ellipse cx="'.($startX - $ecartYeuxRond).'" cy="'.($positionYeux).'" rx="'.($yeuxRondX - $tailleContour / 2).'" ry="'.($yeuxRondY - $tailleContour /2).'"/>' ;
	$svg .= '</clipPath>' ;




	$svg .=   '<ellipse cx="'.($startX + $ecartYeuxRond).'" cy="'.($positionYeux).'" rx="'.$yeuxRondX.'" ry="'.$yeuxRondY.'" fill="'.$couleurPupille.'" stroke-width="'.$tailleContour.'" stroke="'.$couleurContour.'"/>' ;

	$svg .=   '<ellipse cx="'.($startX + $ecartYeuxRond + $positionPupilleX).'" cy="'.($positionYeux + $positionPupilleY).'" rx="'.($taillePupilleX).'" ry="'.($taillePupilleY).'" fill="'.$couleurFondOeil.'" stroke="transparent" clip-path="url(#yeux)"/>' ;

	$svg .=   '<ellipse cx="'.($startX - $ecartYeuxRond).'" cy="'.($positionYeux).'" rx="'.$yeuxRondX.'" ry="'.$yeuxRondY.'" fill="'.$couleurPupille.'" stroke-width="'.$tailleContour.'" stroke="'.$couleurContour.'"/>' ;

	if (rand(1,2) == 1) {
		$svg .=   '<ellipse cx="'.($startX - $ecartYeuxRond - $positionPupilleX).'" cy="'.($positionYeux + $positionPupilleY).'" rx="'.($taillePupilleX).'" ry="'.($taillePupilleY).'" fill="'.$couleurFondOeil.'" stroke="transparent" clip-path="url(#yeux)"/>' ;
	} else {
		$svg .=   '<ellipse cx="'.($startX - $ecartYeuxRond + $positionPupilleX).'" cy="'.($positionYeux + $positionPupilleY).'" rx="'.($taillePupilleX).'" ry="'.($taillePupilleY).'" fill="'.$couleurFondOeil.'" stroke="transparent" clip-path="url(#yeux)"/>' ;
	}

}





// SOURCIL

$destinationX = rand(30,40) ;
$destinationY = rand($longueurCils * -1,$longueurCils) ;

$multx1 = rand(3,7) / 10; 

$multy1 = rand(5,15) / 10 * -1; 

$calc1 = $destinationX * $multx1;
$calc2 = ( $destinationY * $multy1 );

$colorSourcil = getColor($colorPeau, -5) ;

$epaisseurSourcil = rand(2,10);

$positionSourcil = $positionYeuxMax - rand(5,20) -$longueurCils  ;
$espaceSourcil = rand(-1, round($ecartYeux * 1.2)) ;

$svg .= '<path d="
M '.($startX + $espaceSourcil).','.( $positionSourcil).'
q '.$calc1.','.$calc2.' '.($destinationX).','.($destinationY).'
" 
stroke-width="'.$epaisseurSourcil.'" 
stroke="rgb('.$colorSourcil[0].','.$colorSourcil[1].','.$colorSourcil[2].')" fill="transparent"/>' ;

$svg .= '<path d="
M '.($startX - $espaceSourcil).','.($positionSourcil).'
q '.($calc1 * -1).','.$calc2.' '.($destinationX * -1).','.($destinationY).'
" 
stroke-width="'.$epaisseurSourcil.'" 
stroke="rgb('.$colorSourcil[0].','.$colorSourcil[1].','.$colorSourcil[2].')" fill="transparent"/>' ;




$colorBouche = getColor($colorPeau, 6) ;



if (rand(1,2) ==1){
	$svg .=   '<ellipse cx="'.$startX.'" cy="'.($positionContourBouche).'" rx="'.$rayonContourBoucheX.'" ry="'.$rayonContourBoucheY.'" fill="rgb('.$colorBouche[0].','.$colorBouche[1].','.$colorBouche[2].')" stroke="transparent"/>' ;
}

// BOUCHE

$destinationX = rand(25,round($rayonContourBoucheX / 1.5));
$destinationY = rand(10,round($rayonContourBoucheY / 1.5));

$multx1 = rand(2,8) / 10;
$multy1 = rand(5,20) / 10 ; 

$calc1 = $destinationX * $multx1;
$calc2 = ( $destinationY * $multy1 );

$ecartBouche = 0 ;


// NEZ

$rayonNezX = rand(5,15) ;
$rayonNezY = rand(round($rayonNezX * 0.4), round($rayonNezX * 0.8 ));
$positionNez = $positionContourBouche - $rayonContourBoucheY / 2 + rand(-15,5);


$pickbouche = rand(1,3) ;

if ($pickbouche == 1) {

	$positionBouche = $positionNez + $rayonNezY;


	$svg .= '<path d="
	M '.($startX + $ecartBouche).','.( $positionBouche).'
	q '.$calc1.','.$calc2.' '.($destinationX).','.($destinationY).'
	" 
	stroke-width="3" 
	stroke="#1a1a1a" fill="transparent"/>' ;

	$svg .= '<path d="
	M '.($startX - $ecartBouche).','.( $positionBouche).'
	q '.($calc1 * -1).','.$calc2.' '.($destinationX * -1).','.($destinationY).'
	" 
	stroke-width="3" 
	stroke="#1a1a1a" fill="transparent"/>' ;

} else if ($pickbouche == 2) {

	$positionBouche = $positionNez + $rayonNezY + rand(2,12);
	if (rand(1,3) == 3) {
		$positionBouche += $calc2 * 0.6 ;

		$calc2 *= -1;
	}

	$svg .= '<path d="
	M '.($startX + $ecartBouche - $destinationX).','.( $positionBouche ).'
	q '.$destinationX.','.$calc2.' '.($destinationX * 2).',0
	" 
	stroke-width="3" 
	stroke="#1a1a1a" fill="transparent"/>' ;


} else {

	$positionBouche = $positionNez + $rayonNezY;

	$destinationY -= rand(3,6) ;
	$svg .= '<path d="
	M '.($startX + $ecartBouche - $destinationX).','.( $positionBouche).'
	q '.$calc1.','.$calc2.' '.($destinationX).','.($destinationY).'

	Q '.($startX + $destinationX - $calc1 ).','.( ($positionBouche + $calc2) ).' '.($startX + $destinationX ).','.($positionBouche).'
	" 
	stroke-width="3" 
	stroke="#1a1a1a" fill="transparent"/>' ;


}

$pickNez = rand(1,3);
if ($pickNez == 1){

	$svg .= '<ellipse cx="'.$startX.'" cy="'.($positionNez).'" rx="'.$rayonNezX.'" ry="'.$rayonNezY.'" fill="black" stroke="transparent"/>' ;

} else if ($pickNez == 2) {

	$tailleNezTriangle = rand(1,2) ;

	$svg .= '<polygon points="'.($startX - $rayonNezX ).','.($positionNez - $rayonNezY).' '.($startX + $rayonNezX ).','.($positionNez - $rayonNezY).' '.(  (($startX - $rayonNezX ) + ($startX + $rayonNezX ) ) / 2) .','.($rayonNezY  + $positionNez).'" stroke="black" stroke-width="3" stroke-linejoin="round"/>' ;


} else {
	$colorGroin = getColor() ;
	$espacementNarine = rand(5,10) ;
	$rayonNezY = $rayonNezX / 2 ;
	$decaleNarine = rand(0, round($rayonNezX  + $espacementNarine )) ;

	$svg .= '<clipPath id="nez" geometry-box="fill-box">' ;

	$svg .= '<ellipse cx="'.($startX).'" cy="'.($positionNez - $rayonNezY / 2).'" rx="'.($rayonNezX  + $espacementNarine ).'" ry="'.($rayonNezY + $espacementNarine * 0.8).'"/>' ;

	$svg .= '</clipPath>' ;



	$svg .= '<ellipse cx="'.($startX).'" cy="'.($positionNez - $rayonNezY / 2).'" rx="'.($rayonNezX  + $espacementNarine ).'" ry="'.($rayonNezY + $espacementNarine * 0.8).'" fill="rgb('.$colorGroin[0].','.$colorGroin[1].','.$colorGroin[2].')" stroke="transparent"/>' ;

	$svg .= '<ellipse cx="'.($startX + $espacementNarine).'" cy="'.($positionNez - $rayonNezY / 2 + $decaleNarine).'" rx="'.($rayonNezX / 3).'" ry="'.$rayonNezY.'" fill="#1a1a1a" stroke="transparent" clip-path="url(#nez)"/>' ;

	$svg .= '<ellipse cx="'.($startX - $espacementNarine).'" cy="'.($positionNez - $rayonNezY / 2 + $decaleNarine).'" rx="'.($rayonNezX / 3).'" ry="'.$rayonNezY.'" fill="#1a1a1a" stroke="transparent" clip-path="url(#nez)"/>' ;
}



if (rand(1,2) == 1 && $pickNez != 3){
	$svg .=   '<ellipse cx="'.($startX + 2).'" cy="'.($positionNez - $rayonNezY / 2).'" rx="'.($rayonNezX / 4).'" ry="'.($rayonNezY / 5).'"
	fill="Gray"
	stroke="transparent"/>' ;
}


$svg .= "</svg>";






//file_put_contents("../images/fleurs/".rand(1,40).".svg", $svg) ;

echo $svg ;

?>