
	<?php
		$testArray = array();
		$str = file_get_contents('https://api.particle.io/v1/devices/3d003d000a47343432313031/getData?access_token=997c813e54c1d6e7fc6742846075369f8586dada&format=raw');
		
		$testArray = explode(",", $str);

		$inAir = false;
		$jumps = 0;
		$airTime = 0;
		$failSafe = 0;
		$results = array();
		for ($i = 0; $i < count($testArray); $i++) { 
			if (intval($testArray[$i]) > 70 && intval($testArray[$i]) < 76) {
				if ($inAir) {
					$failSafe++;
					if ($failSafe == 3) {
						$inAir = false;
						$failSafe = 0;
						if ($airTime > 5) {
							$results[$jumps] = ($airTime + 1) / 20;
							$jumps++;
						}
						$airTime = 0;
					}
					
				}
			}
			else if (intval($testArray[$i]) < 70 || intval($testArray[$i]) > 76) {
				$inAir = true;
				$airTime++;
			}
		}
		if ($jumps == 0 && $inAir == false) {
			$jumps = "none";
		}



		switch ($jumps) {
			case '1':
				$result = $results[0];
				break;
			case '2':
				$result = $results[0] . "," . $results[1];
				break;
			case '3':
				$result = $results[0] . "," . $results[1] . "," . $results[2];
				break;
			case '0':
				$result = 0; //"invalid. Either you didn't jump or you're magic.";
				break;
				case 'none':
				$result = 0;
				break;
			default:
				$result = 0;
				break;
		}
		
		echo $result;
	?>