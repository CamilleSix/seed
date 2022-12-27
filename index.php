<style type="text/css">

	body{
		background-color: black ;
		color: white ;
	}

	article{
		text-align: center;
	}

	section{
		display: inline-block;
		position: relative;
		vertical-align: top;
	}

	section.recap{
		width: 30% ;
		text-align: left;
		margin-left: 2em ;
	}

	table{
		border-collapse: collapse;
		display: block;
		z-index: 0 ;
		position: relative;
	}
	table td{
		border : 2px solid Silver ;
		height: 4em ;
		width: 4em ;
	}


	div.terre{
		position: absolute;
		bottom: 0 ;
		left: 0 ;
		background-color: rgb(128, 64, 0) ;
		height: 4em ;
		z-index: 20 ;
		width: 100% ;
	}


	span.axeX{
		position: absolute;
		left: 0 ;
		top: 101% ;
	}

	span.axeY{
		position: absolute;
		right: 101% ;
		bottom: 0 ;
	}

	.point{
		border-radius: 100% ;
		background-color: red ;
		height: 0.5em ;
		width: 0.5em ;
		position: absolute;
		z-index: 100 ;
		display: none;
	}

	.relie{
		position: absolute;
		z-index: 50; 
		left: 0 ;
		bottom: 0 ;
		height: 100% ;
		width: 100% ;
	}


</style>

<?php 
$time_start = microtime(true); 


function getColor($step = 1, $class = 'baseColor', $modifHex = 10){

	$color = array() ;

	foreach ($GLOBALS[$class] as $key => $c) {

		$color[$key] = $c + ($modifHex * $step /2) ;

		$color[$key] = $color[$key] + rand($modifHex * 2 * -1,$modifHex * 2) ;

		if ($color[$key] > 255){
			$color[$key] = 255 ;
		} elseif ($color[$key] < 0){
			$color[$key] = 0;

		}
	}
	

	return $color ;

}

function randParam($param){
	if ($param == 'classicXY'){
		$rand = rand(-3,3) + rand(0,99) / 100 ;
	} else if ($param == 'classicXYPositif'){
		$rand = rand(0,3) + rand(1,9) / 100 ;

	} else if ($param == 'multiplicateur'){
		$rand = rand(5,20) / 10 + rand(1,9) / 100 ;

	} else if ($param == 'soft'){
		$rand = 0 + rand(0,9) / 10 ;

	}

	return $rand ;
}

?>
<article>
	<section class="total">

		<span class="axeX">X → </span>
		<span class="axeY">↑ Y </span>

		<div class="terre">

		</div>


		<div class="terreTronc">

		</div>





		<?php 


		$svg = '<svg class="relie" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid meet" x="0" y="0" overflow="visible" xmlns:xlink="http://www.w3.org/1999/xlink">

		<defs>' ;


		$nombreFeuilleDef = 8 ;
		$nombreFleurDef = 8 ;
				$tailleMoyenneTige = rand(3,6); // 1 très courtes tiges, 15 très grandes tiges
				$nombreDivisionBranche = rand(2,5);
				$nTotalBranche = rand(10,30) ;

				$largeurBaseBranche = rand(100,250) / 100  ;
				$quantiteFleur = 0 + rand(30,230) / 100 ;

				$tigeFleur = 0 + rand(25,250) / 100  ; // distance de la "tige" potentielle qui relie la Branche à la fleur, 0 si "pas de tige"

				$nPetale = rand(5,15) ;
				$nombreRangeePetale = rand(1,3) ;

				$baseColor[1] = rand(0,225) ;
				$baseColor[2] = rand(0,225) ;
				$baseColor[3] = rand(0,225) ;

				$colorBranche[1] = rand(0,200) ;
				$colorBranche[2] = rand(0,200) ;
				$colorBranche[3] = rand(0,200) ;

				while (abs(array_sum($baseColor) - array_sum($colorBranche) ) < 50 ) {

					$colorBranche[1] = rand(0,200) ;
					$colorBranche[2] = rand(0,200) ;
					$colorBranche[3] = rand(0,200) ;

				}


				$colorFleur1[1] = rand(0,225) ;
				$colorFleur1[2] = rand(0,225) ;
				$colorFleur1[3] = rand(0,225) ;

				while (abs(array_sum($baseColor) - array_sum($colorFleur1) ) < 100 ) {
					$colorFleur1[1] = rand(0,225) ;
					$colorFleur1[2] = rand(0,225) ;
					$colorFleur1[3] = rand(0,225) ;
				}


				$colorFleur2[1] = rand(0,225) ;
				$colorFleur2[2] = rand(0,225) ;
				$colorFleur2[3] = rand(0,225) ;

				$tailleMax = rand(10,15) ;
				$tailleMaxFleur = rand(2, $tailleMax / 2) ;

				$tailleCentreFleur = 0 + rand(0,50) / 100 ;

				$inclinaisonBranche = rand(-30,30) ;

				if (rand(1,2) == 1){
					$nOndule = rand(1,3) ;

				} else { 
					$nOndule = rand(1,10) ;
				}
			// Les feuilles avec beaucoup de point doivent être plus rares
				$nOnduleFleur = rand(1,5) ; 
					// Les pétales ont maximum 5 points

				//rand(1,(floor($tailleMax / 2)))
				$reverseShapeFeuille = rand(0,1);
				$isOnduleRegulier = rand(0,4);
				$multiplicateurDistance = rand(0,4);

				$isOnduleFleurRegulier = rand(0,4);
				$multiplicateurDistanceFleur = rand(0,4);

				$isExeption = rand(0,1);
				$alternateT = rand(0,1);

				$pickPath =rand(1,4);

				if ($pickPath == 1){
					$definiPathX = array('1','2.5','5', '-3', '7', '-5', '0','-3') ;
					$definiPathY = array('1','0.15','0.3', '1.3', '1.5', '0', '0','2') ;

				} elseif ($pickPath == 2){
					$definiPathX = array('1','0.1','2', '2', '2', '-1', '-1') ;
					$definiPathY = array('1','2','-1', '0.5', '2', '1', '1') ;
				} elseif ($pickPath == 3){
					$definiPathX = array('0.2','0.2', '0', '-0.2', '-0.2', '-0.2') ;
					$definiPathY = array('2','2', '2', '2', '2', '2') ;
				}  elseif ($pickPath == 4){
					$definiPathX = array('2','4', '-1', '-1', '-1', '-1','-1','-1','-1') ;
					$definiPathY = array('1','1', '1', '1', '1', '1', '1', '1', '1') ;
				}



				$sameVal = randParam('classicXYPositif')  ;



				$sumMove = 0 ;
				for ($i=1; $i <= $nOndule; $i++) { 

					if ($i >= round($nOndule /2)) {
						$default = -1 ;
					} else {
						$default = 1 ;
					}

					if ($isOnduleRegulier == 0){
						$geneticsFeuilleX[$i] = $sameVal ;
						$geneticsFeuilleY[$i] = $sameVal ;
					} elseif ($isOnduleRegulier == 1){
						$geneticsFeuilleX[$i] = randParam('classicXYPositif') ;
						$geneticsFeuilleY[$i] = $sameVal ;
					} elseif ($isOnduleRegulier == 2){
						$geneticsFeuilleX[$i] = $sameVal ;
						$geneticsFeuilleY[$i] = randParam('classicXYPositif') ;
					} elseif ($isOnduleRegulier == 3) {
						$geneticsFeuilleX[$i] = randParam('classicXYPositif') ;
						$geneticsFeuilleY[$i] = randParam('classicXYPositif') ;
					} else {
						$geneticsFeuilleX[$i] = randParam('soft');
						$geneticsFeuilleY[$i] = randParam('soft') ;
					}

					if ($multiplicateurDistance == 0){
						$multiplicateurFeuilleX[$i] = $default ;
						$multiplicateurFeuilleY[$i] = 1 ;
					} elseif ($multiplicateurDistance == 1){
						$multiplicateurFeuilleX[$i] = randParam('multiplicateur') * $default;
						$multiplicateurFeuilleY[$i] = 1 ;
					} elseif ($multiplicateurDistance == 2){
						$multiplicateurFeuilleX[$i] = $default ;
						$multiplicateurFeuilleY[$i] = randParam('multiplicateur') ;
					} elseif ($multiplicateurDistance == 3) {
						$multiplicateurFeuilleX[$i] = randParam('multiplicateur') * $default;
						$multiplicateurFeuilleY[$i] = randParam('multiplicateur') ;
					} else {
						if (!empty($definiPathX[$i - 1])){
							$multiplicateurFeuilleX[$i] = $definiPathX[$i - 1];
							$multiplicateurFeuilleY[$i] = $definiPathY[$i - 1] ;		
						} else {
							$multiplicateurFeuilleX[$i] = 0.2;
							$multiplicateurFeuilleY[$i] = 0.2 ;				
						}
					}

					if ($sumMove + $multiplicateurFeuilleX[$i] <= 0){
						$multiplicateurFeuilleX[$i] = 1 ;
					}


					$sumMove += $multiplicateurFeuilleX[$i] ;
				}

				if ($nOndule == 1 && ($multiplicateurFeuilleX[1] < 1 || $geneticsFeuilleX[1] < 1 )  ){
					$multiplicateurFeuilleX[1] = 2 ;
					$geneticsFeuilleX[1] = 3 ;

				}

				$sameVal = randParam('classicXY')  ;


				for ($i=1; $i <= $nOnduleFleur; $i++) { 


					if ($i >= round($nOnduleFleur /2)) {
						$default = -1 ;
					} else {
						$default = 1 ;
					}



					if ($isOnduleFleurRegulier == 0){
						$geneticsFleurX[$i] = $sameVal ;
						$geneticsFleurY[$i] = $sameVal ;
					} elseif ($isOnduleFleurRegulier == 1){
						$geneticsFleurX[$i] = randParam('classicXY') ;
						$geneticsFleurY[$i] = $sameVal ;
					} elseif ($isOnduleFleurRegulier == 2){
						$geneticsFleurX[$i] = $sameVal ;
						$geneticsFleurY[$i] = randParam('classicXY') ;
					} elseif ($isOnduleFleurRegulier == 3) {
						$geneticsFleurX[$i] = randParam('classicXY') ;
						$geneticsFleurY[$i] = randParam('classicXY') ;
					} else {
						$geneticsFleurX[$i] = randParam('soft');
						$geneticsFleurY[$i] = randParam('soft') ;
					}


					if ($multiplicateurDistanceFleur == 0){
						$multiplicateurFleurX[$i] = $default ;
						$multiplicateurFleurY[$i] = 1 ;
					} elseif ($multiplicateurDistance == 1){
						$multiplicateurFleurX[$i] = randParam('multiplicateur') * $default;
						$multiplicateurFleurY[$i] = 1 ;
					} elseif ($multiplicateurDistance == 2){
						$multiplicateurFleurX[$i] = $default ;
						$multiplicateurFleurY[$i] = randParam('multiplicateur') ;
					} elseif ($multiplicateurDistance == 3) {
						$multiplicateurFleurX[$i] = randParam('multiplicateur')  * $default;
						$multiplicateurFleurY[$i] = randParam('multiplicateur') ;
					} else {
						if (!empty($definiPathX[$i - 1])){
							$multiplicateurFleurX[$i] = $definiPathX[$i - 1];
							$multiplicateurFleurY[$i] = $definiPathY[$i - 1] ;		
						} else {
							$multiplicateurFleurX[$i] = 0.2;
							$multiplicateurFleurY[$i] = 0.2 ;	
						}
					}


				}


				$savedData = array('nombreFeuilleDef','nombreFleurDef','tailleMoyenneTige','nombreDivisionBranche','nTotalBranche',
					'largeurBaseBranche','tigeFleur','nPetale','nombreRangeePetale','quantiteFleur','tailleCentreFleur','tailleMax','tailleMaxFleur','inclinaisonBranche','nOndule','nOnduleFleur','reverseShapeFeuille','isOnduleRegulier','multiplicateurDistance','isOnduleFleurRegulier','multiplicateurDistanceFleur','isExeption','alternateT','pickPath', 'geneticsFeuilleX', 'geneticsFeuilleY', 'multiplicateurFeuilleX', 'multiplicateurFeuilleY','geneticsFleurX','geneticsFleurY','multiplicateurFleurX','multiplicateurFleurY', 'baseColor', 'colorBranche', 'colorFleur1','colorFleur2') ;

				$arrayValues = array('geneticsFeuilleX', 'geneticsFeuilleY', 'multiplicateurFeuilleX', 'multiplicateurFeuilleY','geneticsFleurX','geneticsFleurY','multiplicateurFleurX','multiplicateurFleurY','baseColor', 'baseColor', 'colorBranche', 'colorFleur1', 'colorFleur2') ;


				foreach ($savedData as $d) {

					if (is_array(${$d})){
						$goJson[$d] = implode(',',${$d}) ;
					} else {
						$goJson[$d] = ${$d} ;
						$goJson[$d] = strval(round($goJson[$d],3)) ;

					}

				}

				file_put_contents("save.txt", json_encode($goJson,JSON_PRETTY_PRINT)) ;

				$savedRaw = file_get_contents('save.txt') ;

				$saved = json_decode($savedRaw) ;

				foreach ($saved as $key => $value) {

					if (in_array($key, $arrayValues)){
						$exp = explode(',', $value) ;


						foreach ($exp as $nKey => $t) {
							${$key}[$nKey + 1] = $t ;
						}

					} else {
						${$key} = $value ;
					}
				}







				function feuilleComplexe($nOndule, $refX, $refY, $nFeuille, $isFleur = false) {
					$troncateValue = 'Feuille' ;

					if ($isFleur == true){
						$troncateValue = 'Fleur' ;
					}

					$multiplicateurTailleFeuille =  $nFeuille  / $GLOBALS['nombre'.$troncateValue.'Def'] ;


					$defineOnduleFinishY = $refY / $nOndule;

					$defineOnduleFinishX = $multiplicateurTailleFeuille ;

					for ($i=1; $i <= $nOndule; $i++) { 

						$onduleFeuilleX[$i] = $GLOBALS['genetics'.$troncateValue.'X'][$i] * $multiplicateurTailleFeuille;
						$onduleFeuilleY[$i] = $GLOBALS['genetics'.$troncateValue.'Y'][$i] * $multiplicateurTailleFeuille;

						$origineOnduleFeuilleX[$i] = $defineOnduleFinishX * $GLOBALS['multiplicateur'.$troncateValue.'X'][$i]  ;

						$origineOnduleFeuilleY[$i] = $defineOnduleFinishY * $GLOBALS['multiplicateur'.$troncateValue.'Y'][$i] ;


						if ($GLOBALS['isExeption'] == 1){
							if ($i > $nOndule / 2){
							// A partir de 50% des points, réduit la largeur de la feuille
								if ($origineOnduleFeuilleX[$i] > 0){
									$origineOnduleFeuilleX[$i] *= -1 / 2 ;
								}
								$origineOnduleFeuilleY[$i] = abs($origineOnduleFeuilleY[$i]);
								$onduleFeuilleY[$i] = abs($onduleFeuilleY[$i]) ;

							} elseif ($i < $nOndule / 3) {
							// Petite change d'augmenter la distance sur les premiers points
								$origineOnduleFeuilleX[$i] = abs($origineOnduleFeuilleX[$i]) * 1.5 + 0.2 ;

							} 
						}


						if ($nOndule ==1) {
							// Si il n'y a qu'une seule boucle, augmente la largeur
							$origineOnduleFeuilleX[$i] = abs($origineOnduleFeuilleX[$i]) * 2 ;
							$onduleFeuilleX[$i] = abs($onduleFeuilleX[$i]) * 2 ;


						}								


					}

					$coord2 = '' ;
					$coord3 = '' ;
					$saveMinusX = 0 ;
					$saveMinusY = 0;


					for ($o=1; $o <= $nOndule ; $o++) { 




						if ($refX + ($saveMinusX - $origineOnduleFeuilleX[$o]) >= 0 ){

							$origineOnduleFeuilleX[$o] =  abs($origineOnduleFeuilleX[$o]) + $multiplicateurTailleFeuille;
							$onduleFeuilleX[$o] = abs($onduleFeuilleX[$o]) + $multiplicateurTailleFeuille;
						}


						if ($o == $nOndule){

							$origineOnduleFeuilleX[$o] =  $refX + $saveMinusX ;

							if ($saveMinusY > ($refY - 1 )) {
								// si l'ensemble des valeurs Y est inférieur à la hauteur de base, la fermeture de la feuille risque d'etre bizarre, donc autant remettre une valeur par défault
								$refY = $saveMinusY + 1 ;
								$newRefY = true ;
							}

							$origineOnduleFeuilleY[$o] = $refY - $saveMinusY ;


						} else {

							$saveMinusX -= $origineOnduleFeuilleX[$o] ;
							$saveMinusY += $origineOnduleFeuilleY[$o] ;
						}


						if ($GLOBALS['alternateT'] == 1 &&  $o % 2 == 0 && $saveMinusX + $origineOnduleFeuilleX[$o] >= 0) {
							$coord2 .= 't '.$origineOnduleFeuilleX[$o].','.$origineOnduleFeuilleY[$o].' ' ;


							$onduleFeuilleX[$o] *= -1 ;
							$origineOnduleFeuilleX[$o] *= -1 ;

							$coord3 .= 't '.$origineOnduleFeuilleX[$o].','.$origineOnduleFeuilleY[$o].' ' ;

						} else {
							$coord2 .= 'q '.$onduleFeuilleX[$o].' '.$onduleFeuilleY[$o].' '.$origineOnduleFeuilleX[$o].','.$origineOnduleFeuilleY[$o].' ' ;


							$onduleFeuilleX[$o] *= -1 ;
							$origineOnduleFeuilleX[$o] *= -1 ;

							$coord3 .= 'q '.$onduleFeuilleX[$o].' '.$onduleFeuilleY[$o].' '.$origineOnduleFeuilleX[$o].','.$origineOnduleFeuilleY[$o].' ' ;
						}


					}

					$coord[] = $coord2 ;
					$coord[] = $coord3 ;

					if (!empty($newRefY)){
						$coord['newRefY'] = $refY;

					}

					$GLOBALS['fuck'] = $origineOnduleFeuilleX ;

					return $coord ;

				}


				for ($i=1; $i <= $nombreFeuilleDef; $i++) { 


					$taille = $tailleMax * ($i /$nombreFeuilleDef)  ;


					$refX = 0  ;
					$refY =  $taille ;

					$finalX = 0 ;
					$finalY = 0 ;


					$result = feuilleComplexe($nOndule, $refX, $refY, $i) ;
					$coord2 = $result[0] ;
					$coord3 = $result[1] ;

					if (!empty( $result['newRefY'])){
						$refY = $result['newRefY'] ;
					}


					$transform1 = rand(-20,20) ;
					$transform2 = rand(-20,20) ;

					$svg .= '  <g id="leaf'.$i.'" transform="skewX('.$transform1.') skewY('.$transform1.')">' ; 
//transform="skewX('.$transform1.') skewY('.$transform1.')"

					$svg .=  '<path d="M '.$finalX.','.$finalY.' 
					'.$coord2.'
					M '.$finalX.','.$finalY.' 
					'.$coord3.'" 
					stroke-width ="0.2" />';
/*
					// Ligne au milieu de la feuille
					$pickLine = rand(-1.5,1.5) + rand(0,50) / 100 ;

					$svg .= '
					<path d="M 0,0.3
					Q '.($refX + $pickLine).','.($refY / 2).' '.$refX.','.($refY / 1.1).'"
					stroke="white" 
					fill="transparent"
					stroke-opacity="0.2"
					stroke-width ="0.2" />' ;

					$svg .= '
					<path d="M 0,0.3
					Q '.($refX + $pickLine).','.($refY / 2).' '.$refX.','.($refY / 1.1).'"
					stroke="black" 
					fill="transparent"
					stroke-opacity="0.2"
					transform="translate(0.2 0)"
					stroke-width ="0.2" />' ;


					if (rand(1,2) ==1){
						$sideTraitFeuille = $coord2 ;
						$sideTraitFeuille2 = $coord3 ;

					} else {
						$sideTraitFeuille = $coord3 ;
						$sideTraitFeuille2 = $coord2 ;

					}

					$svg .= '<path d="M '.$finalX.','.$finalY.' 
					'.$sideTraitFeuille.'"
					fill="transparent"
					stroke-width ="0.2"
					stroke="white"
					stroke-opacity="0.2"
					/>';

					$svg .= '<path d="M '.$finalX.','.$finalY.' 
					'.$sideTraitFeuille2.'"
					fill="transparent"
					stroke-width ="0.2"
					stroke="black"
					stroke-opacity="0.2"
					/>';
					*/
					$svg .= '</g>';
					?>

				<?php } 



				$anglePetale = 360 * $nombreRangeePetale / $nPetale ;

				$colorTige = getColor(3, 'colorBranche', 2) ;

				$originePetale = $nPetale ;
				for ($i=1; $i <= $nombreFleurDef ; $i++) { 


					$taille = $tailleMaxFleur * ($i /$nombreFleurDef)   ;


					$refX = 0  ;
					$refY =  $taille ;

					$finalX = 0 ;
					$finalY = 0 ;


					$result = feuilleComplexe($nOnduleFleur, $refX, $refY, $i, true) ;
					$coord2 = $result[0] ;
					$coord3 = $result[1] ;


					$transform1 = rand(-10,10) ;
					$transform2 = rand(-10,10) ;

					$colorCentre = getColor(1, 'colorFleur2', 2) ;
					$colorCentreSmall = getColor(5, 'colorFleur2', 5) ;


					$svg .= '<g id="flower'.$i.'" transform="skewX('.$transform1.') skewY('.$transform1.')">' ; 

					if (rand(1,2) == 1){
						$demiFleur = 0.3 ; 
						$nPetale = $originePetale / 4 ;
					} else {
						$demiFleur = 1 ;
						$nPetale = $originePetale ;

					}

// Tige
					if ($tigeFleur > 0){

						$svg .= '
						<path d="M 0,0
						Q '.($refX + rand(-1.5,1.5) + rand(0,50) / 100).','.($refY / 2).' '.($refX * $tigeFleur).','.($refY * $tigeFleur).'"
						stroke="rgb('.$colorTige[1].','.$colorTige[2].','.$colorTige[3].')" 
						fill="transparent"
						stroke-width ="0.3" />' ;
						$refX *= $tigeFleur ;
						$refY *= $tigeFleur ;
					}

					for ($tour=0; $tour <= $nPetale ; $tour++) { 


						$color = getColor($tour, 'colorFleur1', -5) ;


						$svg .= '<path d="M '.$refX .','.$refY.' 
						'.$coord2.'
						M '.$refX.','.$refY.' 
						'.$coord3.'" 
						transform="rotate('.($anglePetale * $tour * $demiFleur).' '.$refX.','.$refY.' )"
						stroke-width ="0.1"
						fill="rgb('.$color[1].','.$color[2].','.$color[3].')"
						/>';
						if (rand(1,2) ==1){
							$sideTraitPetale = $coord2 ;
							$sideTraitPetale2 = $coord3 ;

						} else {
							$sideTraitPetale = $coord3 ;
							$sideTraitPetale2 = $coord2 ;

						}
						/*

						$svg .= '<path d="M '.$refX.','.$refY.' 
						'.$sideTraitPetale.'"
						transform="rotate('.($anglePetale * $tour * $demiFleur).' '.$refX.','.$refY.' )"
						fill="transparent"
						stroke-width ="0.2"
						stroke="white"
						stroke-opacity="0.2"
						/>';

						$svg .= '<path d="M '.$refX.','.$refY.' 
						'.$sideTraitPetale2.'"
						transform="rotate('.($anglePetale * $tour * $demiFleur).' '.$refX.','.$refY.' )"
						fill="transparent"
						stroke-width ="0.2"
						stroke="black"
						stroke-opacity="0.2"
						/>';*/

						if ($demiFleur == 1) {

							$svg .= '<circle cx="'.$refX.'" cy="'.$refY.'" r="'.abs($refY / $tigeFleur * $tailleCentreFleur).'" fill="rgb('.$colorCentre[1].','.$colorCentre[2].','.$colorCentre[3].')"/>';

							$svg .= '<circle cx="'.($refX - rand(-10,10) / 100).'" cy="'.($refY - rand(-10,10) / 100).'" r="'.abs($refY / $tigeFleur * $tailleCentreFleur / 1.5).'" fill="rgb('.$colorCentreSmall[1].','.$colorCentreSmall[2].','.$colorCentreSmall[3].')"/>';
						}
					}

					$svg .= '</g>';
					//transform="skewX('.rand(-20,20).') skewY('.rand(-20,20).')"
					?>

				<?php } 

				$svg .= '</defs>
				<g class="fullPlant">' ;

				for ($i=1; $i <= $nombreFeuilleDef; $i++) { 
					echo '<use xlink:href="#flower'.$i.'"
					x="'.(10 * $i).'" y="10" 
					fill="rgb('.$color[1].','.$color[2].','.$color[3].')" />';

				}
				$nBranche = 0 ;

				$minTige = (-3 - $tailleMoyenneTige);
				$maxTige = (3 + $tailleMoyenneTige)  ;
				$growState = 1.2 ;
				// 1 taille max

				$nTotalBranche = round($nTotalBranche * $growState) ;


				for ($i=0; $i < $nTotalBranche; $i++) { 

					if (!empty($saveX) ){
						$start['x'] = $saveX ;
						$start['y'] = $saveY ;

						$step = $saveCoord[$saveX.'-'.$saveY]['step'] + 1;


			// réduit de 10 tons le vert à la fin de chaque branche si rangée suivante
						$finish['x'] = rand(-10,10).'.'.rand(1,99); 
						$finish['y'] = rand($minTige,$maxTige/2).'.'.rand(1,99); 

					// Plus souple sur le point d'arrivé des tiges une fois la première branche dépassée



						while ($start['y'] + $finish['y'] >= 80) {
							$finish['y']  =  $finish['y'] - 10 ;
						}



					} else {
						$start['x'] = rand(45,55) ;
						$start['y'] = 91 ;
						$step = 1 ;
						$finish['x'] = rand(-5,5).'.'.rand(1,99); 
						$finish['y'] = rand(-10,-20).'.'.rand(1,99); 

						$saveCoord[$start['x'].'-'.$start['y']] = array('x' => $start['x'],'y' => $start['y'] , 'step' => 0) ;

					}
					$arc['x'] = rand(50,100);
					$arc['y'] = $arc['x'] * rand(1,10)  ;
					$sens = rand(0,1) ;



					$incline = rand(-20,20).'.'.rand(1,99); 


					$largeurBaseBrancheTige = $largeurBaseBranche / $step * 1.5 * $growState;

					$colorBranche = getColor($step, 'colorBranche', 1) ;
					$startX = $start['x'] ; 
					$startY = $start['y'] ; 

					$finishX = $finish['x'] * $growState; 
					$finishY = $finish['y'] * $growState; 
					$svg .= '
					<g>
					<path d ="M '.$startX.','.$startY.' 
					a '.$arc['x'].' '.$arc['y'].' '.$incline.' 0 '.$sens.' '.$finishX.','.$finishY.'" fill ="none" stroke ="rgb('.$colorBranche[1].','.$colorBranche[2].','.$colorBranche[3].')" stroke-width ="'.$largeurBaseBrancheTige.'"/>';
/*
					$svg .= '<path d ="M '.$startX.','.$startY.' 
					a '.$arc['x'].' '.$arc['y'].' '.$incline.' 0 '.$sens.' '.$finishX.','.$finishY.'" 
					fill ="none" stroke ="white" 
					stroke-width ="'.($largeurBaseBrancheTige /4).'"
					stroke-opacity="0.2"
					transform="translate(-'.($largeurBaseBrancheTige/2).' 0)"
					/>';

					$svg .= '<path d ="M '.$startX.','.$startY.' 
					a '.$arc['x'].' '.$arc['y'].' '.$incline.' 0 '.$sens.' '.$finishX.','.$finishY.'" 
					fill ="none" stroke ="black" 
					stroke-width ="'.($largeurBaseBrancheTige /4).'"
					stroke-opacity="0.2"
					transform="translate('.($largeurBaseBrancheTige/2).' 0)"
					/>**/
					$svg .= '</g>';



					$finalX = $startX + $finishX ;
					$finalY = $startY + $finishY ;

					$svg .= '<circle cx="'.$finalX.'" cy="'.$finalY.'" r="'.($largeurBaseBrancheTige / 4).'" stroke="rgb('.($colorBranche[1] + 5).','.($colorBranche[2] + 5).','.($colorBranche[3] + 5).')" fill="rgb('.$colorBranche[1].','.$colorBranche[2].','.$colorBranche[3].')"/>';

					if ($nBranche % $nombreDivisionBranche == 0 ){
						$saveX = $finalX;
						$saveY = $finalY;
					}




					$nFeuille = ceil(rand(3,$tailleMax * 2 - $tailleMax ) * $growState) ;

				// le nombre de feuille dépend de la taille maximale (hauteur) de la feuille
					for ($f=0; $f < $nFeuille ; $f++) { 

						$getDef = $step ;

						$getDef = $getDef + rand(-2,2) ;
						if ($getDef > $nombreFeuilleDef){
							$getDef = $nombreFeuilleDef ;
						}

						if ($getDef < 1){
							$getDef = 1 ;
						}

						if (rand(1,2) == 1){
							$decaleX = $finalX  + rand(0,99)/100 ;
							$decaleY = $finalY  + rand(0,99)/100 ;
						} else {
							$decaleX = $finalX ;
							$decaleY = $finalY ;
						}


						$color = getColor() ;

						$rotate = rand(-180,180) ;

						$svg .= '<use xlink:href="#leaf'.$getDef.'"
						x="'.$finalX.'" y="'.$finalY.'" 
						transform="rotate('.$rotate.' '.$decaleX.' '.$decaleY.')" 	
						fill="rgb('.$color[1].','.$color[2].','.$color[3].')" />';



					}




					if ($step > 1){
						$nFleur = round(rand(0, $quantiteFleur * $step ) * $growState) ;
				// le nombre de fleur dépend de la taille maximale (hauteur) de la feuille
						for ($f=0; $f < $nFleur; $f++) { 

							if (rand(1,2) == 1){
								$decaleX = $finalX  + (rand(0,99)/100 * $growState) ;
								$decaleY = $finalY  + (rand(0,99)/100 * $growState) ;
							} else {
								$decaleX = $finalX ;
								$decaleY = $finalY ;
							}





							$rotate = rand(-180,180) ;

							$svg .= '<use xlink:href="#flower'.$getDef.'" id="fleur'.$i.$f.'"
							x="'.$finalX.'" y="'.$finalY.'" 
							transform="rotate('.$rotate.' '.$decaleX.' '.$decaleY.')" />';


						}

					}


					$saveCoord[$finalX.'-'.$finalY] = array('x' => $finalX,'y' => $finalY , 'step' => $step) ;


					if (rand(1,5) == 3 || $step > 4){

						$pickOld = array_rand($saveCoord) ;

						$saveX = $saveCoord[$pickOld]['x'] ;
						$saveY = $saveCoord[$pickOld]['y'] ;
						$switchOrigineBranche = 1 ;
					}


					$nBranche++ ;



				} 
				$svg .= '</g>
				</svg>' ;

				file_put_contents("svg".rand(1,40).".svg", $svg) ;

				echo $svg ;
				?>




				<div class="tige">


				</div>

				<table class="grille">
					<?php for ($i=0; $i < 10 ; $i++) { 
						echo "<tr>";

						for ($j=0; $j < 10; $j++) { 
							echo "<td></td>";
						}

						echo "</tr>";
					} ?>

				</table>
			</section>

			<section class="recap">
				<?php echo nl2br($savedRaw) ;?>
			</section>

	<?php 		//print_r(getColor()) ;
	//	print_r($saveCoord) ;

	$time_end = microtime(true);
	$execution_time = ($time_end - $time_start);
	echo '<br><b>Total Execution Time:</b> '.round($execution_time,3).' s';
	print_r($multiplicateurFeuilleX) ;
	?>
</article>

