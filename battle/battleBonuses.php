<!-- BONUSES OF TROOPS ATTACKING OTHER TROOPS -->

<?PHP


Function attackBonuses($fightingTroopsTotalAttack,$troopType,$targetTroop,$targetTroopRange) {
	//echo "Incoming attack = " . $fightingTroopsTotalAttack . " Distance = " . $targetTroopRange . "<br>";
	
	//Constants
		//Pikes
		$PIKES_LIGHT_CAV = 3;
		$PIKES_LIGHT_CAVARCH = 5;
		$PIKES_KNIGHT_CAV = 2.5;
		//Swords
		$SWORDS_MILITIA = 5;
		$SWORDS_CLUBMEN = 4;
		$SWORDS_PIKEMEN = 3;
		$SWORDS_ARCHERS = 2;
		//Archers
		$ARCHERS_LONG = 1;//70 + m 
		$ARCHERS_MED = 1.5;//30 - 69 m
		$ARCHERS_SHORT = 2;//3 - 29
		//Ranged Siege
		$SIEGE_LONG = 2;
		$SIEGE_MED = 1;
		$SIEGE_CLOSE = 0.1;
	
	$attackValue = $fightingTroopsTotalAttack;//Store incoming attack value locally

	switch($troopType) {
		case 2://--------------------------------------- PIKEMEN ---------------------------------
		switch($targetTroop) {
			case 7://Cav-Arch
			$attackValue = round($attackValue*$PIKES_LIGHT_CAVARCH);
			break;
			case 8://Light-Cav
			$attackValue = round($attackValue*$PIKES_LIGHT_CAV);
			break;
			case 9://Knights
			$attackValue = round($attackValue*$PIKES_KNIGHT_CAV);
			break;
		}
		break;
		case 3://--------------------------------------- SWORDSMAN ---------------------------------
		switch($targetTroop) {
			case 0://Militia
			$attackValue = round($attackValue*$SWORDS_MILITIA);
			break;
			case 1://Clubmen
			$attackValue = round($attackValue*$SWORDS_CLUBMEN);
			break;
			case 2://Pikes
			$attackValue = round($attackValue*$SWORDS_PIKEMEN);
			break;
			case 5://Achers
			$attackValue = round($attackValue*$SWORDS_ARCHERS);
			break;
			case 6://Crossbowmen
			$attackValue = round($attackValue*$SWORDS_ARCHERS);
			break;
		}
		break;
		case 5://--------------------------------------- ARCHERS ---------------------------------
		if($targetTroopRange > 70) {
			$attackValue = ($attackValue*$ARCHERS_LONG);
		} else {
			if($targetTroopRange > 30) {
				$attackValue = ($attackValue*$ARCHERS_MED);
			} else {
				if($targetTroopRange > 3) {
					$attackValue = ($attackValue*$ARCHERS_SHORT);
				} else {
					$attackValue = ($attackValue*0.5);
				}
			}
		}
		break;
		case 5://------------------------------------- CROSSBOWMEN ---------------------------------
		if($targetTroopRange > 40) {
			$attackValue = ($attackValue*$ARCHERS_LONG);
		} else {
			if($targetTroopRange > 10) {
				$attackValue = ($attackValue*$ARCHERS_MED);
			} else {
				$attackValue = ($attackValue*$ARCHERS_SHORT);
			}
		}
		break;
		case 7://------------------------------------- CAV-ARCHER ---------------------------------
		if($targetTroopRange > 40) {
			$attackValue = ($attackValue*$ARCHERS_LONG);
		} else {
			if($targetTroopRange > 10) {
				$attackValue = ($attackValue*$ARCHERS_MED);
			} else {
				$attackValue = ($attackValue*$ARCHERS_SHORT);
			}
		}
		break;
		case 11://------------------------------------- BALLISTA ----------------------------------
		if($targetTroopRange > 100) {
			$attackValue = ($attackValue*$SIEGE_LONG);
		} else {
			if($targetTroopRange > 10) {
				$attackValue = ($attackValue*$SIEGE_MED);
			} else {
				$attackValue = ($attackValue*$SIEGE_CLOSE);
			}
		}
		break;
		case 13://------------------------------------- CATAPULT ----------------------------------
		if($targetTroopRange > 150) {
			$attackValue = ($attackValue*$SIEGE_LONG);
		} else {
			if($targetTroopRange > 10) {
				$attackValue = ($attackValue*$SIEGE_MED);
			} else {
				$attackValue = ($attackValue*$SIEGE_CLOSE);
			}
		}
		break;
		case 14://------------------------------------- TREBUCHET ----------------------------------
		if($targetTroopRange > 300) {
			$attackValue = ($attackValue*$SIEGE_LONG);
		} else {
			if($targetTroopRange > 50) {
				$attackValue = ($attackValue*$SIEGE_MED);
			} else {
				$attackValue = ($attackValue*$SIEGE_CLOSE);
			}
		}
		break;
	}
	
	//echo "Outgoing attack = " . $attackValue . "<br>";		
	return $attackValue;
}	

?>