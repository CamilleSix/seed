<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body{
			box-sizing: border-box;
			font-family: Verdana, Geneva, sans-serif	;
		}


		article{
			text-align: center;
			white-space: nowrap;

		}

		nav.menu{
			display: inline-block;
			vertical-align: top;
			width: 20% ;
			height: 90vh ;
			padding: 1em ;
			white-space: normal;
		}
		nav.menu img.logo{
			width: 60% ;
			display: block;
			margin : 0 auto 2em ;
		}

		nav.menu ul img{
			height: 2.5em ;
		}

		nav.menu ul li{
			padding: 0.8em ;
			border-radius: 1em ;
			display: inline-block;
			vertical-align: middle;
			margin : 0.5em ;
		}
		section.main{
			display: inline-block;
			vertical-align: top;
			width: 90vh;
			height: 90vh ;
			background-color: Gainsboro ;
			position: relative;
			overflow: hidden;
			object-fit: contain;
			border-radius: 0.5em ;
			border : 2px solid whitesmoke ;

		}


		section.data{
			display: inline-block;
			vertical-align: top;

			width: 20% ;
			white-space: normal;
		}

		 .clouds, .landscape{
			position: absolute;
			left: -5% ;
			top: -5% ;
			width: 110% ;

		}

		.roches, .herbes, .horizonClose{
			position: absolute;
			left: 0 ;
			top: 0 ;
			width: 100% ;

		}

		section.sol{
			position: absolute;
			top : 0 ;
			left: 0 ;
			height: 100% ;
			width: 100% ;
		}


		section.main svg.full{
			position: absolute;
			top : 0 ;
			left: 0 ;
			height: 100% ;
			width: 100% ;
		}
/*
		div.arbre{
			height: 20% ;
			width: 100% ;
			left: 0 ;
			position: absolute;
		}
		*/
		svg.arbre{
			height: 140px ;
			position: absolute;
		}


		svg.fleur{
			height: 25px ;
			width: 25px;
			position: absolute;

		}


		.house{
			height: 120px ;
			position: absolute;


		}



		.clouds {
			transform-origin: center;
			animation-name: spin;
			animation-duration: 600000ms;
			animation-iteration-count: infinite;

		}

		@keyframes spin { 
			from { 
				transform: rotate(0deg); 

				} to { 
					transform: rotate(360deg); 

				}
			}
			
			
			.vent1{
				animation-name: vent;
				animation-duration: 4000ms;
				animation-iteration-count: infinite;
				transform: translate3d(0, 0, 0);
				animation-timing-function: linear ;
			}


			@keyframes vent { 

				0% { transform: translateX(0) translateY(0); }
				10% { transform: translateX(1px) translateY(1px); }
				20% { transform: translateX(0) translateY(0); }
				30% { transform: translateX(-1px) translateY(0); }
				40% { transform: translateX(0) translateY(0); }
				100% { transform: translateX(0) translateY(0); }

			}

			.vent2{
				animation-name: vent;
				animation-duration: 3000ms;
				animation-iteration-count: infinite;
				transform: translate3d(0, 0, 0);
				animation-timing-function: linear ;
			}



			.vent3{
				animation-name: vent;
				animation-duration: 2000ms;
				animation-iteration-count: infinite;
				transform: translate3d(0, 0, 0);
				animation-timing-function: linear ;
			}


			.vent4{
				animation-name: vent;
				animation-duration: 5000ms;
				animation-iteration-count: infinite;
				transform: translate3d(0, 0, 0);
				animation-timing-function: linear ;
			}



		</style>
	</head>
	<?php  

	$origine = 'map' ;

	require_once 'fonctions/getColor.php' ;

	function generatePath($nPoint = 10,$possYReference, $color, $width = 100, $height = 50, $startX = -10, $opacity = 1, $strokeWidth = 0.2, $closePath = 0) {

		$horizonPoints = $nPoint ;
		$baseHorizon = $possYReference ;
		$lastY = $baseHorizon ;
		$lastX = $startX ;

		$lastVariaY = rand(-5,10) / 20 ;

		$pointX = array() ;

		$result = '' ;

		if ($closePath <= 1){

			$result .= '
			<path d="M '.$startX.' '.$baseHorizon.' ' ;
		}


		while (array_sum($pointX)  < $width) {
			$newPointX = $width / $horizonPoints * ( 1 + (rand(-5,15) / 10 ) );


			$destiY = $lastY + rand($height * -1 ,$height)  ;

			$variaY = rand(-5,10) / 20 ;

			if (rand(1,3) == 1){
				$destiY = $baseHorizon + rand($height * -2 ,$height * 2)  ;
			}

			$pointX[] = $newPointX ;


			$arraySum = array_sum($pointX) ;


			if (array_sum($pointX) + $newPointX >= $width) {
				$destiY = $baseHorizon ;
			}

			$destiY = round($destiY,2) ;



			$result .= 'Q '.round( ($startX + $arraySum ) - ($newPointX / 2),2).' '.round( ($destiY + $lastY ) / 2 + ($height * $variaY),2).' '.round($startX + $arraySum,2).' '.$destiY.' ' ;

			$lastY = $destiY ;
			$lastX = $newPointX ;

			$lastVariaY = $variaY ;

		} 

		if ($closePath == 1){

			$result .= generatePath($horizonPoints,$baseHorizon,$color, $width, $height, $destiY, $opacity, $strokeWidth, 3) ;

		} elseif ($closePath == 3) {

			$result .= '" fill="rgb('.$color[0].','.$color[1].','.$color[2].')" 
			stroke="rgb('.$color[0].','.$color[1].','.$color[2].')" 
			fill-opacity="'.$opacity.'"
			stroke-width="'.$strokeWidth.'"
			/>' ;

		} else {
			$result .= 'L '.($startX + $arraySum).' '.($destiY + 10).'
			L '.$startX.' '.($destiY + 10).'"' ;
			$result .= 'fill="rgb('.$color[0].','.$color[1].','.$color[2].')" 
			stroke="rgb('.$color[0].','.$color[1].','.$color[2].')" 
			fill-opacity="'.$opacity.'"
			stroke-width="'.$strokeWidth.'"
			/>' ;

		}


		return $result ;
	}

	function generateHerbe($nPoint = 10,$possYReference, $color, $width = 100, $height = 50, $startX = -10, $opacity = 1, $strokeWidth = 0.2) {

		$horizonPoints = $nPoint ;
		$baseHorizon = $possYReference ;
		$lastY = $baseHorizon ;

		$pointX = array() ;
		$result = '
		<path d="M '.$startX.' '.$baseHorizon.' ' ;

		$alternate = 1 ;

		while (array_sum($pointX)  < $width) {
			$newPointX = $width / $horizonPoints * (1 + (rand(1,100) / 100));


			$pointX[] = $newPointX ;


			$arraySum = array_sum($pointX) ;

			$destiY =  $height + rand(-100,100) / 100 ;

			if ($alternate == 1){
				$destiY = $baseHorizon - $destiY;
				$alternate = 2 ;
			} else {
				$destiY = $baseHorizon + rand(-100,100) / 100;
				$alternate = 1 ;
			}

			if (array_sum($pointX) + $newPointX >= $width) {
				$destiY = $baseHorizon ;
			}
			$destiY = round($destiY,2) ;

			$lastY = $destiY ;

			$result .= '
			Q '.round(($startX + ($arraySum - ($newPointX / 2) + (rand(-100,100) / 100) ) ),2).','.round(($destiY + rand(0,30) / 10),2).' '.round($startX + $arraySum,2).','.$destiY.' ' ;
		} 
		$result .= 'L '.($startX + $arraySum).' '.($destiY + 10).'
		L '.$startX.' '.($destiY + 10).'"
		fill="rgb('.$color[0].','.$color[1].','.$color[2].')" 
		stroke="rgb('.$color[0].','.$color[1].','.$color[2].')" 
		stroke-width="'.$strokeWidth.'"
		fill-opacity="'.$opacity.'"
		/>' ;

		echo $result ;
	}

	require_once 'params/objets.php' ;

	$espaceOccupe = array() ;



	function generateObjet ($objet, $variante, $baseHorizon,$pickPossX) {

		$param = $GLOBALS['param'] ;

		$file = file_get_contents('images/'.$objet.'s/'.$objet.$variante.'.svg') ;

		if (!empty($param[$objet.$variante]['hauteurDefaut'])){
			$taille = $param[$objet.$variante]['hauteurDefaut'] ;
		} else {
			$taille = $param[$objet]['hauteurDefaut'] ;
		}

		$file = str_replace('{classStyle}', ' style="left:'.($pickPossX).'%; bottom :'.(99 - $baseHorizon).'%; position:absolute; height:'.$taille.'%; width :'.$taille.'%;">', $file) ;

		for ($p=1; $p <= $param[$objet]['nombreCouleurMax']; $p++) { 
			$colorObjet = getColor() ;
			$colorObjetMoins = getColor($colorObjet, 2) ;
			$colorObjetPlus = getColor($colorObjet, -2) ;

			$file =str_replace('{COLOR'.$p.'}', 'rgb('.$colorObjet[0].','.$colorObjet[1].','.$colorObjet[2].')', $file) ;
			$file =str_replace('{COLOR'.$p.'+}', 'rgb('.$colorObjetPlus[0].','.$colorObjetPlus[1].','.$colorObjetPlus[2].')', $file) ;
			$file =str_replace('{COLOR'.$p.'-}', 'rgb('.$colorObjetMoins[0].','.$colorObjetMoins[1].','.$colorObjetMoins[2].')', $file) ;
		}

		for ($i=0; $i < $param[$objet]['largeurDefaut'] ; $i++) { 
			$GLOBALS['espaceOccupe'][$baseHorizon.'-'.($pickPossX + $i)] = 1 ;
		}
		echo $file;
	}


	function spawnObjet($objet,$baseHorizon ) {

		$param = $GLOBALS['param'] ;
		$espaceOccupe =  $GLOBALS['espaceOccupe'] ;



		if (rand(1,100) <= $param[$objet]['chanceSpawn']){

			$pickPossX = rand(0,80) ;

			while (!empty($espaceOccupe[$baseHorizon.'-'.$pickPossX])) {
				$pickPossX = rand(0,80) ;
			}
			generateObjet($objet,rand(1,$param[$objet]['nombreVariante']), $baseHorizon,$pickPossX );

		}

	}

	/* COLORS */

// BIOME 
	$colorHerbe = getColor() ;

	$colorStone[] = rand(120,180); $colorStone[] = rand(120,180);$colorStone[] = rand(50,150) ;
	$colorStoneAlt[] = rand(0,100); $colorStoneAlt[] = rand(0,100);$colorStoneAlt[] = rand(0,100);
	$colorCiel[] = rand(0,200); $colorCiel[] = rand(0,200); $colorCiel[] = rand(150,250) ;

// ARBRES
	$colorFeillage[] = rand(50,200); $colorFeillage[] = rand(50,200); $colorFeillage[] = rand(50,200) ;

	$colorTronc[] = rand(50,200); $colorTronc[] = rand(50,200); $colorTronc[] = rand(50,200) ;

// FLEURS 

	$nombreModeleFleur = 10 ;
	for ($i=1; $i <= $nombreModeleFleur ; $i++) { 

		$colorFeuille[$i][] = rand(50,200); $colorFeuille[$i][] = rand(50,200); $colorFeuille[$i][] = rand(50,200) ;

		$colorTige[$i][] = rand(50,200); $colorTige[$i][] = rand(50,200); $colorTige[$i][] = rand(50,200) ;

		$colorFleur[$i][] = rand(50,200); $colorFleur[$i][] = rand(50,200); $colorFleur[$i][] = rand(50,200) ;
		$colorCoeurFleur[$i][] = rand(0,250); $colorCoeurFleur[$i][] = rand(0,250); $colorCoeurFleur[$i][] = rand(0,250) ;

	}



	$nArbre = 1 ;
	$canvas = '' ;
	$multCanvas = 10 ;

	?>

	<body>

		<article>
			<nav class="menu">
				<img src="logo.png" class="logo">
				<ul>
					<li style="background-color: #ffd633 ;"><img src="images/icones/information.svg"></li>
					<li style="background-color: #ff80ff ;"><img src="images/icones/random.svg"></li>
					<li style="background-color: #ff9966 ;"><img src="images/icones/sac.svg"></li>
					<li style="background-color: #1ac6ff ;"><img src="images/icones/personnage.svg"></li>
					<li style="background-color: #ff4d4d ;"><img src="images/icones/coeur.svg"></li>
					<li style="background-color: #00cc66 ;"><img src="images/icones/fleur.svg"></li>


				</ul>
			</nav>
			<section class="main">

				<svg class="defs" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" x="0" y="0" overflow="visible" class="full">
					<defs>


						<filter id="stone">

							<feTurbulence type="fractalNoise" baseFrequency=".02 .01" numOctaves="6"/>
							<feDisplacementMap in="SourceGraphic" scale="25"/>
							<feGaussianBlur result="blurOut" in="offOut" stdDeviation="0.1"/>

						</filter>



						<filter id="filter" x="-20%" y="-20%" width="140%" height="140%" filterUnits="objectBoundingBox" primitiveUnits="userSpaceOnUse" color-interpolation-filters="linearRGB">
							<feTurbulence type="fractalNoise" baseFrequency="0.05 0.05" numOctaves="5" seed="3" stitchTiles="stitch" result="turbulence"/>
							<feComposite in="SourceGraphic" in2="turbulence" operator="in" result="composite2"/>
							<feComposite in="composite2" in2="SourceAlpha" operator="lighter" result="composite4"/>
							<feBlend mode="multiply" x="0%" y="0%" width="100%" height="100%" in="composite2" in2="SourceGraphic" result="blend2"/>


						</filter>


						<filter id="dropshadow" height="120%" width="130%">

							<feGaussianBlur in="SourceAlpha" stdDeviation="0.5" result="blur"/>
							<feOffset in="blur" dx="0.1" dy="0.1" result="offsetBlur"/>
							<feFlood flood-color="#1a1a1a" flood-opacity="0.8" result="offsetColor"/>
							<feComposite in="offsetColor" in2="offsetBlur" operator="in" result="combine"/>
							<feMerge> 
								<feMergeNode/> <!-- this contains the offset blurred image -->
								<feMergeNode in="SourceGraphic"/> <!-- this contains the element that the filter is applied to -->
							</feMerge>
						</filter>

						<?php 
						$color= getColor() ;
						$saveColor = $color ;

						for ($i=1; $i < 4; $i++) { ?>
							<pattern id="rocks<?php echo $i ;?>" x="0" y="0" width="100%" height="100%">

								<rect x="0" y="0" width="120" height="120" fill="<?php 
								echo'rgb('.$color[0].','.$color[1].','.$color[2].')' ; ?>"/>
								<g filter='url(#stone)'>

									<?php for ($s=0; $s < 10; $s++) { ?>

										<ellipse cx="<?php echo rand(0,100) ;?>" cy="<?php echo rand(0,100) ;?>" rx="<?php echo rand(10,30) ;?>" ry="<?php echo rand(10,20) ;?>" fill="<?php $colorSmallStone = getColor($color, rand(-2,2)) ;
										echo'rgb('.$colorSmallStone[0].','.$colorSmallStone[1].','.$colorSmallStone[2].')' ;
										?>"
										fill-opacity="0.5"

										/>
										<?php for ($s2=0; $s2 < 20; $s2++) { ?>

											<ellipse cx="<?php echo rand(0,100) ;?>" cy="<?php echo rand(0,100) ;?>" rx="<?php echo round(rand(500,1500) / rand(300,1000),2) ;?>" ry="<?php echo round(rand(400,800) / rand(300,1000),2) ;?>" fill="<?php $colorSmallStone = getColor($color, rand(-2,2)) ;
											echo'rgb('.$colorSmallStone[0].','.$colorSmallStone[1].','.$colorSmallStone[2].')' ;
											?>"
											fill-opacity="0.5"
											/>
										<?php } ?>


									<?php } ?>

								</g>

							</pattern>

							<?php $color = getColor($color,-1.5) ; }  ?>

						</defs>


						<?php $possSunX = rand(0,100)  ;
						$possSunY = rand(0,40) ;

						$colorCielClair = getColor($colorCiel, 12) ;

						$canvas .= '
						var sky = ctx.createRadialGradient('.($possSunX * $multCanvas).', '.($possSunY * $multCanvas).', 0, '.($possSunX * $multCanvas + 100).', '.($possSunY * $multCanvas + 100 ).', 1000);

						sky.addColorStop(0, "#ffffcc");
						sky.addColorStop("0.03", "#ffe680");
						sky.addColorStop("0.1", "rgb('.$colorCielClair[0].','.$colorCielClair[1].','.$colorCielClair[2].')");
						sky.addColorStop(1, "rgb('.$colorCiel[0].','.$colorCiel[1].','.$colorCiel[2].')");

						ctx.fillStyle = sky;
						ctx.fillRect(0, 0, 1000, 1000);
						' ;
						?>

						<radialGradient id="sky" cx="<?php echo $possSunX ;?>%" cy="<?php echo $possSunY ;?>%" r="100%">
							<stop offset="0%" stop-color="#ffffcc"/>
							<stop offset="3%" stop-color="#ffe680"/>
							<stop offset="10%" stop-color="rgb(<?php 

							echo $colorCielClair[0].','.$colorCielClair[1].','.$colorCielClair[2] ;?>)"/>							<stop offset="100%" stop-color="rgb(<?php echo $colorCiel[0].','.$colorCiel[1].','.$colorCiel[2] ;?>)"/>
							</radialGradient>

							<rect x="0" y="0" width="100" height="100" fill="url(#sky)"/>

							<ellipse cx="<?php echo $possSunX ;?>" cy="<?php echo $possSunY ;?>" rx="10" ry="10"
								fill="#ffffe6"
								stroke="#fff3e6"
								stroke-opacity="0.8"
								/>
								<?php $canvas .= "
								ctx.fillStyle = '#ffffe6';
								ctx.lineWidth = 10;
								ctx.strokeStyle = '#fff3e6';

								ctx.beginPath();
								ctx.arc(".($possSunX * $multCanvas).", ".($possSunY * $multCanvas).", 100, 0, 2 * Math.PI);
								ctx.stroke();
								ctx.fill();" ;?>
							</svg>

							<svg class="clouds" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" x="0" y="0" overflow="visible">
								<?php require_once 'map_nuages.php' ;?>

							</svg>



							<?php 
							$nHorizon = 4 ;
							$color = array() ;

							echo '<svg class="landscape" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" x="0" y="0" overflow="visible">

							<g filter="url(#filter)">';

							for ($h=1; $h <= $nHorizon ; $h++) {


								$horizonPoints = 30 ;
								$baseHorizon = 25 + (3 * $h) ;
								$color = getColor($color,-1);



								echo generatePath($horizonPoints,$baseHorizon, $color,110, 4, -10, 1,1) ;
								echo generatePath($horizonPoints,$baseHorizon, $color,110, 3, -10, 1,1) ;


							} 

							echo "</g>
							</svg>";
							$nHorizonStep = 3 ;
							$color = array() ;

							for ($h=1; $h <= $nHorizonStep ; $h++) {

								echo '<svg class="roches" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" x="0" y="0" overflow="visible">' ;
								$horizonPoints = rand(2,6 / $h) ;
								$baseHorizon = 25 + (20 * $h) ;

								$pointX = array() ;




								for ($s=0; $s < 20; $s++) {



									if (rand(1,2) == 1){
										$getColorRock = $colorStone ;
									} else {
										$getColorRock = $colorStoneAlt ;
									}
									$pickX = rand(-10,110) ;
									$pickY = $baseHorizon + 2 ;

									echo generatePath(12,$baseHorizon -1 , $getColorRock,rand(10,30),rand(-25,-2) / 10, $pickX, 0.9, 0) ;
								} 

								echo '</svg>
								<svg class="herbes vent'.rand(1,4).'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" x="0" y="0" overflow="visible">' ;


								for ($i=0; $i < 10; $i++) { 
									$largeur = rand(5,10) ;
									$possX = rand(-10,110) ;
									echo generateHerbe($largeur * 3,$baseHorizon  , $colorHerbe ,$largeur , 2, $possX , 1, 0.1) ;
									echo generateHerbe($largeur * 3,$baseHorizon  , $colorHerbe ,$largeur , 2, $possX , 1, 0) ;
								} 


								echo "
								</svg>";

								for ($a=0; $a < rand(1,4) ; $a++) { 

									require 'generateArbre/index.php' ;


								}



								for ($fl=0; $fl < rand(10,30) ; $fl++) { 
									require 'generateFleur/index.php' ;


								}


								spawnObjet('maison',$baseHorizon) ;
								spawnObjet('pot',$baseHorizon) ;
								spawnObjet('coffre',$baseHorizon) ;





								echo '<svg class="horizonClose" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" x="0" y="0" overflow="visible">' ;

								?>

								<path d="M -10 <?php 
								echo $baseHorizon ;
								$saveCanvasPath = array() ;
								for ($i = 1; $i <= $horizonPoints ; $i++ ) {
									$pointX[$i] = rand(10,100 / $horizonPoints) ;

									if ($i == $horizonPoints){
										$pointX[$i] = 100  ;
									}

									$destiY = $baseHorizon ;
									$finalX = array_sum($pointX) - ($pointX[$i] / 2) + rand(-2,2) ;

									echo ' Q '.$finalX ;
									echo ','.($finalY = $destiY - rand(-1,1)).' ' ;
									// point de courbe centré =  ($pointX[$i] / 2)

									$saveCanvasPath[] = ' Q '.($finalX * $multCanvas).','.($finalY = $destiY * $multCanvas - rand(-5,5)).' '.(array_sum($pointX) * 10).','.($destiY *$multCanvas) ;
									echo array_sum($pointX).','.$destiY ;

									$saveSafePoint[] = array('x' => array_sum($pointX), 'y' => $destiY ) ;

								}


								$colorStroke = getColor($saveColor, -1) ;
								/* $canvas .= "
								ctx.fillStyle = 'url(#rocks".$h.")';
								ctx.lineWidth = 2 ;
								ctx.strokeStyle = 'rgb(".$colorStroke[0].",".$colorStroke[1].",".$colorStroke[2].")';

								horizon = new Path2D('M -100 ".($baseHorizon * $multCanvas)." ".implode(' ', $saveCanvasPath)." L 1000 1000 L 0 1000');
								ctx.stroke(horizon);
								ctx.fill(horizon);" ;
*/

								?>
								L 100 100
								L 0 100"
								fill="url(#rocks<?php echo $h ;?>)"
								stroke="<?php 
								echo'rgb('.$colorStroke[0].','.$colorStroke[1].','.$colorStroke[2].')' ;
								?>"
								stroke-width="0.3"></path>


								<?php  
								echo "
								</svg>
								";
							} ?>



						</section>
						<section class="data"><?php print_r($espaceOccupe) ;?></section>

					</article>
<?php /*
					<canvas id="canvas" height="1000" width="1000">
						
					</canvas>

					<canvas  id="save" height="1000" width="1000">

					</canvas>
					*/?>


					<script src="https://code.jquery.com/jquery-3.5.0.js"></script>

					<script type="text/javascript">

/*
						var canvas = document.getElementById('canvas');
						var save = document.getElementById('save');

						var ctx = canvas.getContext('2d');
						var clouds = save.getContext('2d');

						<?php // echo $canvas ; ?>

						*/

						function getRandom(min, max) {
							min = Math.ceil(min);
							max = Math.floor(max);
							return Math.floor(Math.random() * (max - min +1)) + min;
						}

											//setInterval(refreshFrame, 3000); 

											countLoop = 0 ;

											function refreshFrame() { 


												$(".feuillageVent" + getRandom(1,3)).each(function() {

													newPoints =$(this).attr('data-points');
													oldPoints =$(this).attr('points');

													$(this).attr('points', newPoints );
													$(this).attr('data-points', oldPoints );

												});




											}


														/*
														var countLoop = 0 ;
														skyLoop(120) ; 

														function skyLoop(distance) {


															$("svg.clouds").animate({
																"left": "+="+ distance +"%" 
																}, {

																	duration: distance * 100,
																	specialEasing: {width: "linear"},
																	complete: function() {

																		$("svg.clouds").css('left' , '-100% ') ;
																		skyLoop(220) ;

																	}
																	});

																}


																*/



															</script>
														</body>
														</html>
