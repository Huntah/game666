<!-- BASE STATS OF TROOP TYPES -->

<?PHP

Function upgradedStats($troopType,$statsArray,$technologyArray) {
	
	$baseStatArray = $statsArray;

	switch($troopType) {
		case 0://Militia
		if($technologyArray[0] > 0) { $statsArray[1] = $statsArray[1] + round($baseStatArray[1]*(($technologyArray[0]*0.025))); };//Discipline (all attack)
		if($technologyArray[1] > 0) { $statsArray[1] = $statsArray[1] + round($baseStatArray[1]*(($technologyArray[1]*0.05))); };//Swordsmanship (melee attack)
		if($technologyArray[2] > 0) { $statsArray[3] = $statsArray[3] + round($baseStatArray[3]*(($technologyArray[2]*0.05))); };//Endurance (foot speed)
		if($technologyArray[5] > 0) { $statsArray[4] = $statsArray[4] + round($baseStatArray[4]*(($technologyArray[5]*0.05))); };//Plate Armour (troop defence)
		if($technologyArray[11] > 0) { $statsArray[0] = $statsArray[0] + round($baseStatArray[0]*(($technologyArray[11]*0.05))); };//Medicine (troop HP)
		break;
		case 1://Clubmen
		if($technologyArray[0] > 0) { $statsArray[1] = $statsArray[1] + round($baseStatArray[1]*(($technologyArray[0]*0.025))); };//Discipline (all attack)
		if($technologyArray[1] > 0) { $statsArray[1] = $statsArray[1] + round($baseStatArray[1]*(($technologyArray[1]*0.05))); };//Swordsmanship (melee attack)
		if($technologyArray[2] > 0) { $statsArray[3] = $statsArray[3] + round($baseStatArray[3]*(($technologyArray[2]*0.05))); };//Endurance (foot speed)
		if($technologyArray[5] > 0) { $statsArray[4] = $statsArray[4] + round($baseStatArray[4]*(($technologyArray[5]*0.05))); };//Plate Armour (troop defence)
		if($technologyArray[11] > 0) { $statsArray[0] = $statsArray[0] + round($baseStatArray[0]*(($technologyArray[11]*0.05))); };//Medicine (troop HP)
		break;
		case 2://Pikemen
		if($technologyArray[0] > 0) { $statsArray[1] = $statsArray[1] + round($baseStatArray[1]*(($technologyArray[0]*0.025))); };//Discipline (all attack)
		if($technologyArray[1] > 0) { $statsArray[1] = $statsArray[1] + round($baseStatArray[1]*(($technologyArray[1]*0.05))); };//Swordsmanship (melee attack)
		if($technologyArray[2] > 0) { $statsArray[3] = $statsArray[1] + round($baseStatArray[3]*(($technologyArray[2]*0.05))); };//Endurance (foot speed)
		if($technologyArray[5] > 0) { $statsArray[4] = $statsArray[4] + round($baseStatArray[4]*(($technologyArray[5]*0.05))); };//Plate Armour (troop defence)
		if($technologyArray[11] > 0) { $statsArray[0] = $statsArray[0] + round($baseStatArray[0]*(($technologyArray[11]*0.05))); };//Medicine (troop HP)
		break;
		case 3://Swordsman
		if($technologyArray[0] > 0) { $statsArray[1] = $statsArray[1] + round($baseStatArray[1]*(($technologyArray[0]*0.025))); };//Discipline (all attack)
		if($technologyArray[1] > 0) { $statsArray[1] = $statsArray[1] + round($baseStatArray[1]*(($technologyArray[1]*0.05))); };//Swordsmanship (melee attack)
		if($technologyArray[2] > 0) { $statsArray[3] = $statsArray[3] + round($baseStatArray[3]*(($technologyArray[2]*0.05))); };//Endurance (foot speed)
		if($technologyArray[5] > 0) { $statsArray[4] = $statsArray[4] + round($baseStatArray[4]*(($technologyArray[5]*0.05))); };//Plate Armour (troop defence)
		if($technologyArray[11] > 0) { $statsArray[0] = $statsArray[0] + round($baseStatArray[0]*(($technologyArray[11]*0.05))); };//Medicine (troop HP)
		break;
		case 4://Scout
		if($technologyArray[0] > 0) { $statsArray[1] = $statsArray[1] + round($baseStatArray[1]*(($technologyArray[0]*0.025))); };//Discipline (all attack)
		if($technologyArray[1] > 0) { $statsArray[1] = $statsArray[1] + round($baseStatArray[1]*(($technologyArray[1]*0.05))); };//Swordsmanship (melee attack)
		if($technologyArray[2] > 0) { $statsArray[3] = $statsArray[3] + round($baseStatArray[3]*(($technologyArray[2]*0.05))); };//Endurance (foot speed)
		if($technologyArray[5] > 0) { $statsArray[4] = $statsArray[4] + round($baseStatArray[4]*(($technologyArray[5]*0.05))); };//Plate Armour (troop defence)
		if($technologyArray[11] > 0) { $statsArray[0] = $statsArray[0] + round($baseStatArray[0]*(($technologyArray[11]*0.05))); };//Medicine (troop HP)
		break;
		case 5://Archer
		if($technologyArray[0] > 0) { $statsArray[1] = $statsArray[1] + round($baseStatArray[1]*(($technologyArray[0]*0.025))); };//Discipline (all attack)
		if($technologyArray[2] > 0) { $statsArray[3] = $statsArray[3] + round($baseStatArray[3]*(($technologyArray[2]*0.05))); };//Endurance (foot speed)
		if($technologyArray[5] > 0) { $statsArray[4] = $statsArray[4] + round($baseStatArray[4]*(($technologyArray[5]*0.05))); };//Plate Armour (troop defence)
		if($technologyArray[6] > 0) { $statsArray[2] = $statsArray[2] + round($baseStatArray[2]*(($technologyArray[6]*0.05))); };//Fletching (archer range)
		if($technologyArray[7] > 0) { $statsArray[1] = $statsArray[1] + round($baseStatArray[1]*(($technologyArray[7]*0.05))); };//Broadhead Arrows (archer attack)
		if($technologyArray[11] > 0) { $statsArray[0] = $statsArray[0] + round($baseStatArray[0]*(($technologyArray[11]*0.05))); };//Medicine (troop HP)
		break;
		case 6://Crossbowmen
		if($technologyArray[0] > 0) { $statsArray[1] = $statsArray[1] + round($baseStatArray[1]*(($technologyArray[0]*0.025))); };//Discipline (all attack)
		if($technologyArray[2] > 0) { $statsArray[3] = $statsArray[3] + round($baseStatArray[3]*(($technologyArray[2]*0.05))); };//Endurance (foot speed)
		if($technologyArray[5] > 0) { $statsArray[4] = $statsArray[4] + round($baseStatArray[4]*(($technologyArray[5]*0.05))); };//Plate Armour (troop defence)
		if($technologyArray[6] > 0) { $statsArray[2] = $statsArray[2] + round($baseStatArray[2]*(($technologyArray[6]*0.05))); };//Fletching (archer range)
		if($technologyArray[7] > 0) { $statsArray[1] = $statsArray[1] + round($baseStatArray[1]*(($technologyArray[7]*0.05))); };//Broadhead Arrows (archer attack)
		if($technologyArray[11] > 0) { $statsArray[0] = $statsArray[0] + round($baseStatArray[0]*(($technologyArray[11]*0.05))); };//Medicine (troop HP)
		break;
		case 7://Cav-Archer
		if($technologyArray[0] > 0) { $statsArray[1] = $statsArray[1] + round($baseStatArray[1]*(($technologyArray[0]*0.025))); };//Discipline (all attack)
		if($technologyArray[3] > 0) { $statsArray[3] = $statsArray[3] + round($baseStatArray[3]*(($technologyArray[3]*0.05))); };//Horse Shoes (horse speed)
		if($technologyArray[5] > 0) { $statsArray[4] = $statsArray[4] + round($baseStatArray[4]*(($technologyArray[5]*0.05))); };//Plate Armour (troop defence)
		if($technologyArray[6] > 0) { $statsArray[2] = $statsArray[2] + round($baseStatArray[2]*(($technologyArray[6]*0.05))); };//Fletching (archer range)
		if($technologyArray[7] > 0) { $statsArray[1] = $statsArray[1] + round($baseStatArray[1]*(($technologyArray[7]*0.05))); };//Broadhead Arrows (archer attack)
		if($technologyArray[8] > 0) { $statsArray[1] = $statsArray[1] + round($baseStatArray[1]*(($technologyArray[8]*0.05))); };//Horse back riding (horse attack)
		if($technologyArray[11] > 0) { $statsArray[0] = $statsArray[0] + round($baseStatArray[0]*(($technologyArray[11]*0.05))); };//Medicine (troop HP)
		break;
		case 8://Light-Cav
		if($technologyArray[0] > 0) { $statsArray[1] = $statsArray[1] + round($baseStatArray[1]*(($technologyArray[0]*0.025))); };//Discipline (all attack)
		if($technologyArray[3] > 0) { $statsArray[3] = $statsArray[3] + round($baseStatArray[3]*(($technologyArray[3]*0.05))); };//Horse Shoes (horse speed)
		if($technologyArray[5] > 0) { $statsArray[4] = $statsArray[4] + round($baseStatArray[4]*(($technologyArray[5]*0.05))); };//Plate Armour (troop defence)
		if($technologyArray[8] > 0) { $statsArray[1] = $statsArray[1] + round($baseStatArray[1]*(($technologyArray[8]*0.05))); };//Horse back riding (horse attack)
		if($technologyArray[11] > 0) { $statsArray[0] = $statsArray[0] + round($baseStatArray[0]*(($technologyArray[11]*0.05))); };//Medicine (troop HP)
		break;
		case 9://Knight
		if($technologyArray[0] > 0) { $statsArray[1] = $statsArray[1] + round($baseStatArray[1]*(($technologyArray[0]*0.025))); };//Discipline (all attack)
		if($technologyArray[3] > 0) { $statsArray[3] = $statsArray[3] + round($baseStatArray[3]*(($technologyArray[3]*0.05))); };//Horse Shoes (horse speed)
		if($technologyArray[5] > 0) { $statsArray[4] = $statsArray[4] + round($baseStatArray[4]*(($technologyArray[5]*0.05))); };//Plate Armour (troop defence)
		if($technologyArray[8] > 0) { $statsArray[1] = $statsArray[1] + round($baseStatArray[1]*(($technologyArray[8]*0.05))); };//Horse back riding (horse attack)
		if($technologyArray[11] > 0) { $statsArray[0] = $statsArray[0] + round($baseStatArray[0]*(($technologyArray[11]*0.05))); };//Medicine (troop HP)
		break;
		case 10://Wagon
		if($technologyArray[0] > 0) { $statsArray[1] = $statsArray[1] + round($baseStatArray[1]*(($technologyArray[0]*0.025))); };//Discipline (all attack)
		if($technologyArray[4] > 0) { $statsArray[3] = $statsArray[3] + round($baseStatArray[3]*(($technologyArray[4]*0.05))); };//Drill (mech speed)
		if($technologyArray[12] > 0) { $statsArray[0] = $statsArray[0] + round($baseStatArray[0]*(($technologyArray[12]*0.05))); };//Animal Hides (mech HP)
		break;
		case 11://Ballista
		if($technologyArray[0] > 0) { $statsArray[1] = $statsArray[1] + round($baseStatArray[1]*(($technologyArray[0]*0.025))); };//Discipline (all attack)
		if($technologyArray[4] > 0) { $statsArray[3] = $statsArray[3] + round($baseStatArray[3]*(($technologyArray[4]*0.05))); };//Drill (mech speed)
		if($technologyArray[12] > 0) { $statsArray[0] = $statsArray[0] + round($baseStatArray[0]*(($technologyArray[12]*0.05))); };//Animal Hides (mech HP)
		break;
		case 12://Ram
		if($technologyArray[0] > 0) { $statsArray[1] = $statsArray[1] + round($baseStatArray[1]*(($technologyArray[0]*0.025))); };//Discipline (all attack)
		if($technologyArray[4] > 0) { $statsArray[3] = $statsArray[3] + round($baseStatArray[3]*(($technologyArray[4]*0.05))); };//Drill (mech speed)
		if($technologyArray[9] > 0) { $statsArray[2] = $statsArray[2] + round($baseStatArray[2]*(($technologyArray[9]*0.05))); };//Siege Engineering (mech range)
		if($technologyArray[10] > 0) { $statsArray[1] = $statsArray[1] + round($baseStatArray[1]*(($technologyArray[10]*0.05))); };//Chemistry (mech damage)
		if($technologyArray[12] > 0) { $statsArray[0] = $statsArray[0] + round($baseStatArray[0]*(($technologyArray[12]*0.05))); };//Animal Hides (mech HP)
		break;
		case 13://Catapult
		if($technologyArray[0] > 0) { $statsArray[1] = $statsArray[1] + round($baseStatArray[1]*(($technologyArray[0]*0.025))); };//Discipline (all attack)
		if($technologyArray[4] > 0) { $statsArray[3] = $statsArray[3] + round($baseStatArray[3]*(($technologyArray[4]*0.05))); };//Drill (mech speed)
		if($technologyArray[9] > 0) { $statsArray[2] = $statsArray[2] + round($baseStatArray[2]*(($technologyArray[9]*0.05))); };//Siege Engineering (mech range)
		if($technologyArray[10] > 0) { $statsArray[1] = $statsArray[1] + round($baseStatArray[1]*(($technologyArray[10]*0.05))); };//Chemistry (mech damage)
		if($technologyArray[12] > 0) { $statsArray[0] = $statsArray[0] + round($baseStatArray[0]*(($technologyArray[12]*0.05))); };//Animal Hides (mech HP)
		break;
		case 14://Trebuchet
		if($technologyArray[0] > 0) { $statsArray[1] = $statsArray[1] + round($baseStatArray[1]*(($technologyArray[0]*0.025))); };//Discipline (all attack)
		if($technologyArray[4] > 0) { $statsArray[3] = $statsArray[3] + round($baseStatArray[3]*(($technologyArray[4]*0.05))); };//Drill (mech speed)
		if($technologyArray[9] > 0) { $statsArray[2] = $statsArray[2] + round($baseStatArray[2]*(($technologyArray[9]*0.05))); };//Siege Engineering (mech range)
		if($technologyArray[10] > 0) { $statsArray[1] = $statsArray[1] + round($baseStatArray[1]*(($technologyArray[10]*0.05))); };//Chemistry (mech damage)
		if($technologyArray[12] > 0) { $statsArray[0] = $statsArray[0] + round($baseStatArray[0]*(($technologyArray[12]*0.05))); };//Animal Hides (mech HP)
		break;
	}
return $statsArray;
}	

?>