<!-- ALTERS STATS DEPENDING ON HERO USED -->

<?PHP

Function heroStats($returnArray,$heroArray) {
	//Calculate new attack based on ATTK stat(Each 100 attack increases attack stat by 10)
	$returnArray[1] = $returnArray[1] + round($heroArray[1]/10);
	//Calculate new attack based on TACTIC stat(Each 100 tactic increases attack stat by 5)
	$returnArray[1] = $returnArray[1] + round($heroArray[2]/20);
	
	//Calculate new defence based on TACTIC stat(Each 100 tactic increases defence stat by 10)
	$returnArray[4] = $returnArray[4] + round($heroArray[2]/10);
	
	return $returnArray;

}	

?>