<!-- SYSTEM FUNCTIONS -->

<?PHP

//Converts a given int into a troop name string
Function getTroopType($troopTypeInt) {
	$return = "";
	switch ($troopTypeInt) {
		case 0:
		$return = "Militia";
		break;
		case 1:
		$return = "Clubmen";
		break;
		case 2:
		$return = "Pikemen";
		break;
		case 3:
		$return = "Swordsman";
		break;
		case 4:
		$return = "Scouts";
		break;
		case 5:
		$return = "Archers";
		break;
		case 6:
		$return = "Crossbowmen";
		break;
		case 7:
		$return = "Cav-Archers";
		break;
		case 8:
		$return = "Light-Cavs";
		break;
		case 9:
		$return = "Knights";
		break;
		case 10:
		$return = "Wagons";
		break;
		case 11:
		$return = "Ballista";
		break;
		case 12:
		$return = "Siege Rams";
		break;
		case 13:
		$return = "Catapults";
		break;
		case 14:
		$return = "Trebuchets";
		break;
	}
return $return;
}	

?>