
<rect fill="blue"  x="50" y="50" width="2" height="2" />
<?php 
$base = time();

$canvas .= "
p = new Array() ;
clouds.fillStyle = 'white';
clouds.lineJoin =  'round' ;
clouds.lineWidth = ".(rand(3,6) * $multCanvas ).";
clouds.strokeStyle = 'White';" ;


for ($i=0; $i < 70 ; $i++) { 

	$now = strval($base * ($i + 1)) ;
	$multiplicateurPair = 5 ;
	$multiplicateurImpair = -5 ;

	if ($i% 2 == 0){
		$multiplicateurPair = -5 ;
		$multiplicateurImpair = 5 ;

	}

/*
			$baseX = (($now[8].$now[9]) + $i - $now[7] ) + ($i * $multiplicateurPair) ; 
			$baseY = (($now[6].$now[7]) + ($i * $multiplicateurImpair) ) / 3 ; 
*/

			$baseX = rand(-20,90) ; 
			$baseY = rand(-20,90) ; 


			if (empty($possSunX)){
				$possSunX = 50 ;
				$possSunY = 50 ;
			}
			?>



			<linearGradient id="RadialGradient<?php echo $i ;?>" 
				x1="<?php echo $possSunX ;?>%" y1="<?php echo $possSunY ;?>%"
				x2="<?php echo $baseX ;?>%" y2="<?php echo $baseY ;?>%">
				<stop offset="0%" stop-color="#fff3e6"/>
				<stop offset="100%" stop-color="white"/>

			</linearGradient>

			<polygon id="nuage<?php echo $i ;?>"
				stroke="url(#RadialGradient<?php echo $i ;?>)"
				fill="white"
				stroke-width="<?php echo rand(3,6) ;?>"
				stroke-linejoin="round" 

				points="
				<?php 

				$nPoint = rand(5,15);

				for ($n=0; $n < $nPoint ; $n++) { 

					if ($n == 0){
						$lettre = "M" ;
						} else{
							$lettre = "L" ;	
						}
						$canvasPath = $lettre ;



						if ($baseY >= 30 && $baseY <= 70){
							$cloud = round($baseX += round(rand(-30,30) / 30,2)) ;
							$canvasPath .= round($baseX * $multCanvas + round(rand(-30,30) / 30,2) * $multCanvas ) ;

							} else {
								$cloud = $baseX += round(rand(-60,60) / 30,2) ;
								$canvasPath .= round($baseX * $multCanvas + round(rand(-60,60) / 30,2) * $multCanvas ) ;

							}


							$cloud .= ",";
							$canvasPath .= ",";

							$pick = round(rand(-70,70) / 30,2) ;
							$cloud .= round($baseY + $pick);
							$canvasPath  .= round($baseY * $multCanvas + $pick * $multCanvas ) ;
							$cloud .= " " ;
							$canvasPath .= " " ;

							echo $cloud ;
							$saveCanvasPath[] = $canvasPath ;


						} 

						$canvas .= "
						p[".$i."] = new Path2D('".implode(' ', $saveCanvasPath)." Z');
						" ;

						?>"/>


					</polygon>
				<?php } 

				$canvas .= "

/*


				for (var i = 0; i < p.length; i++) {

					clouds.stroke(p[i]);

				}




				countSky = 0 ;


				function skyClouds() {

					ctx.translate(500, 500);

					ctx.clearRect(-500, -500, 1500, 1500);

					ctx.rotate(countSky * Math.PI / 180);

					ctx.drawImage(save, -500, -500);

					countSky = countSky + 0.01 ;
					ctx.setTransform(1, 0, 0, 1, 0, 0);

					window.requestAnimationFrame(skyClouds);

				}

				window.requestAnimationFrame(skyClouds);

*/

				" ;
				?>

