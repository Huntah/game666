<!-- BASE STATS OF TROOP TYPES -->

<?PHP

Function returnBaseStat($troopType,$technologies,$heroArray) {
	//echo "<br>";
	//echo '<pre>',print_r($technologies),'</pre>';	
	//echo "<br>";
	//Create array that must be filled out then returned
	$returnArray = array();

	switch($troopType) {
		/*						HP	  ATTACK  RANGE	  SPEED	 DEFENCE  LOAD   UPKEEP	   FOOD		 LUMBER	  IRON    STONE   GOLD	  TIME*/
		//----------------------------------------------------------------------------------------------
		case 0://Militia - Quick to make, weak and not very fast, very little armour
		$returnArray = array(	50	,	10	,	2	,	10	,	10	,	5	,  1	,	100   ,    50	,	10	,	0	,	0	,	0.5);
		break;
		//----------------------------------------------------------------------------------------------
		/*						HP	  ATTACK  RANGE	  SPEED	 DEFENCE  LOAD   UPKEEP	   FOOD		 LUMBER	  IRON    STONE   GOLD	  TIME*/
		case 1://Clubmen - Quick to make, stronger attack than militia, very little armour
		$returnArray = array(	60	,	15	,	2	,	10	,	15	,	4	,	2	,	150   ,    80	,	10	,	0	,	0	,	0.7);
		break;
		//----------------------------------------------------------------------------------------------
		/*						HP	  ATTACK  RANGE	  SPEED	 DEFENCE  LOAD   UPKEEP	   FOOD		 LUMBER	  IRON    STONE   GOLD	  TIME*/
		case 2://Pikemen - Bonus vs cav - long range spear, little armour
		$returnArray = array(	75	,	25	,	8	,	16	,	25	,	4	,	3	,	200   ,    300	,	50	,	0	,	20	,	1);
		break;
		//----------------------------------------------------------------------------------------------
		/*						HP	  ATTACK  RANGE	  SPEED	 DEFENCE  LOAD   UPKEEP	   FOOD		 LUMBER	  IRON    STONE   GOLD	  TIME*/
		case 3://Swordsman - Bonus vs pikes - med range sword, high armour, slow moving
		$returnArray = array(	95	,	30	,	5	,	20	,	35	,	4	,	5	,	250   ,    50	,	200	,	0	,	30	,	1.2);
		break;
		//----------------------------------------------------------------------------------------------
		/*						HP	  ATTACK  RANGE	  SPEED	 DEFENCE  LOAD   UPKEEP	   FOOD		 LUMBER	  IRON    STONE   GOLD	  TIME*/
		case 4://Scout - Used for scouting - short range knife, no armour
		$returnArray = array(	50	,	20	,	1	,	500	,	20	,	1	,	3	,	500   ,    10	,	20	,	0	,	10	,	1.3);
		break;
		//----------------------------------------------------------------------------------------------
		/*						HP	  ATTACK  RANGE	  SPEED	 DEFENCE  LOAD   UPKEEP	   FOOD		 LUMBER	  IRON    STONE   GOLD	  TIME*/
		case 5://Archer - long range arrows, little armour
		$returnArray = array(	75	,	30	,	100	,	25	,	15	,	4	,	6	,	220   ,    150	,	50	,	0	,	35	,	2);
		break;
		//----------------------------------------------------------------------------------------------
		/*						HP	  ATTACK  RANGE	  SPEED	 DEFENCE  LOAD   UPKEEP	   FOOD		 LUMBER	  IRON    STONE   GOLD	  TIME*/
		case 6://Crossbow - short range bolt, little armour
		$returnArray = array(	80	,	35	,	50	,	25	,	15	,	4	,	6	,	220   ,    140	,	70	,	0	,	40	,	2.2);
		break;
		//----------------------------------------------------------------------------------------------
		/*						HP	  ATTACK  RANGE	  SPEED	 DEFENCE  LOAD   UPKEEP	   FOOD		 LUMBER	  IRON    STONE   GOLD	  TIME*/
		case 7://Cav-Archer - short range arrow, fast mover
		$returnArray = array(	150	,	30	,	50	,	50	,	20	,	20	,	20	,	500   ,    150	,	150	,	0	,	50	,	3);
		break;
		//----------------------------------------------------------------------------------------------
		/*						HP	  ATTACK  RANGE	  SPEED	 DEFENCE  LOAD   UPKEEP	   FOOD		 LUMBER	  IRON    STONE   GOLD	  TIME*/
		case 8://Light Cav - fast moving horseback swordsman, med armour
		$returnArray = array(	150	,	40	,	6	,	110	,	30	,	30	,	20	,	500   ,    75	,	250	,	0	,	50	,	2.8);
		break;
		//----------------------------------------------------------------------------------------------
		/*						HP	  ATTACK  RANGE	  SPEED	 DEFENCE  LOAD   UPKEEP	   FOOD		 LUMBER	  IRON    STONE   GOLD	  TIME*/
		case 9://Knight - horceback swordsman - slower type, heavy armour
		$returnArray = array(	220	,	60	,	6	,	100	,	60	,	25	,	40	,	800   ,    75	,	500	,	0	,	100	,	4);
		break;
		//----------------------------------------------------------------------------------------------
		/*						HP	  ATTACK  RANGE	  SPEED	 DEFENCE  LOAD   UPKEEP	   FOOD		 LUMBER	  IRON    STONE   GOLD	  TIME*/
		case 10://Wagon - Non-combat - can carry heavy loads
		$returnArray = array(	40	,	0	,	0	,	10	,	0	,	250	,	0	,	25   ,    800	,	50	,	0	,	10	,	3);
		break;
		//----------------------------------------------------------------------------------------------
		/*						HP	  ATTACK  RANGE	  SPEED	 DEFENCE  LOAD    UPKEEP	FOOD	   LUMBER	    IRON     STONE     GOLD	   TIME*/
		case 11://Ballista - Med Range siege unit, high attack, slow
		$returnArray = array(	250	,	70	,	150	,	5	,	50	,	1	,	120	,	1500   ,    1500	,	1000	,	0	,	150	,	4.5);
		break;
		//----------------------------------------------------------------------------------------------
		/*						HP	  ATTACK  RANGE	  SPEED	 DEFENCE  LOAD   UPKEEP	   FOOD		 LUMBER	  IRON    STONE   GOLD	  TIME*/
		case 12://Ram - Short Range siege unit, Very high attack, very slow
		$returnArray = array(	750	,	75   ,	  2	,	4	,	200	,	1	,	150	,	1500   ,    2200	,	1500	,	0	,	175	,	5);
		break;
		//----------------------------------------------------------------------------------------------
		/*						HP	  ATTACK  RANGE	  SPEED	 DEFENCE  LOAD   UPKEEP	   FOOD		 LUMBER	  IRON    STONE   GOLD	  TIME*/
		case 13://Catapult - Long Range siege unit, high attack, slow
		$returnArray = array(	250	,	85	,	300	,	4	,	75	,	1	,	200	,	2000   ,    3200	,	2000	,	5000	,	200	,	6);
		break;
		//----------------------------------------------------------------------------------------------
		/*						HP	  ATTACK  RANGE	  SPEED	 DEFENCE  LOAD   UPKEEP	   FOOD		 LUMBER	  IRON    STONE   GOLD	  TIME*/
		case 14://Trebuchet - Very Long Range siege unit, Very high attack, slow
		$returnArray = array(	250	,	100	,	500	,	3	,	100	,	1	,	350	,	3000   ,    5200	,	3500	,	10000	,	300	,	8);
		break;
		//----------------------------------------------------------------------------------------------
		/*						HP	  ATTACK  RANGE	  SPEED	 DEFENCE  LOAD   UPKEEP	   FOOD		 LUMBER	  IRON    STONE   GOLD	  TIME*/
	}
	//Get techs
	$returnArray = upgradedStats($troopType,$returnArray,$technologies);
	$returnArray = heroStats($returnArray,$heroArray);
	//echo "<br>";
	//echo '<pre>',print_r($returnArray),'</pre>';	
	//echo "<br>";
	return $returnArray;
}	

?>