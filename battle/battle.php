<!-- Battle Simulation Test -->



<script type="text/javascript">
	//JS FUNCTIONS
	
		//Set all techs to max
		function setTechMax() {
		   document.getElementById('tech1Attk').value = '10';document.getElementById('tech2Attk').value = '10';document.getElementById('tech3Attk').value = '10';document.getElementById('tech4Attk').value = '10';
		   document.getElementById('tech5Attk').value = '10';document.getElementById('tech6Attk').value = '10';document.getElementById('tech7Attk').value = '10';document.getElementById('tech8Attk').value = '10';
		   document.getElementById('tech9Attk').value = '10';document.getElementById('tech10Attk').value = '10';document.getElementById('tech11Attk').value = '10';document.getElementById('tech12Attk').value = '10';
		   document.getElementById('tech13Attk').value = '10';
		   document.getElementById('tech1Def').value = '10';document.getElementById('tech2Def').value = '10';document.getElementById('tech3Def').value = '10';document.getElementById('tech4Def').value = '10';
		   document.getElementById('tech5Def').value = '10';document.getElementById('tech6Def').value = '10';document.getElementById('tech7Def').value = '10';document.getElementById('tech8Def').value = '10';
		   document.getElementById('tech9Def').value = '10';document.getElementById('tech10Def').value = '10';document.getElementById('tech11Def').value = '10';document.getElementById('tech12Def').value = '10';
		   document.getElementById('tech13Def').value = '10';
		}
		//Set all techs to zero
		function setTechZero() {
		   document.getElementById('tech1Attk').value = '0';document.getElementById('tech2Attk').value = '0';document.getElementById('tech3Attk').value = '0';document.getElementById('tech4Attk').value = '0';
		   document.getElementById('tech5Attk').value = '0';document.getElementById('tech6Attk').value = '0';document.getElementById('tech7Attk').value = '0';document.getElementById('tech8Attk').value = '0';
		   document.getElementById('tech9Attk').value = '0';document.getElementById('tech10Attk').value = '0';document.getElementById('tech11Attk').value = '0';document.getElementById('tech12Attk').value = '0';
		   document.getElementById('tech13Attk').value = '0';
		   document.getElementById('tech1Def').value = '0';document.getElementById('tech2Def').value = '0';document.getElementById('tech3Def').value = '0';document.getElementById('tech4Def').value = '0';
		   document.getElementById('tech5Def').value = '0';document.getElementById('tech6Def').value = '0';document.getElementById('tech7Def').value = '0';document.getElementById('tech8Def').value = '0';
		   document.getElementById('tech9Def').value = '0';document.getElementById('tech10Def').value = '0';document.getElementById('tech11Def').value = '0';document.getElementById('tech12Def').value = '0';
		   document.getElementById('tech13Def').value = '0';
		}
		//Set all troops to zero
		function setTroopsZero() {
		   document.getElementById('militiaAttk').value = '0';document.getElementById('militiaDef').value = '0';document.getElementById('clubmenAttk').value = '0';document.getElementById('clubmenDef').value = '0';
		   document.getElementById('pikemenAttk').value = '0';document.getElementById('pikemenDef').value = '0';document.getElementById('swordsmanAttk').value = '0';document.getElementById('swordsmanDef').value = '0';
		   document.getElementById('scoutsAttk').value = '0';document.getElementById('scoutsDef').value = '0';document.getElementById('archerAttk').value = '0';document.getElementById('archerDef').value = '0';
		   document.getElementById('crossbowmenAttk').value = '0';document.getElementById('crossbowmenDef').value = '0';document.getElementById('cavArcherAttk').value = '0';document.getElementById('cavArcherDef').value = '0';
		   document.getElementById('lightCavAttk').value = '0';document.getElementById('lightCavDef').value = '0';document.getElementById('knightAttk').value = '0';document.getElementById('knightDef').value = '0';
		   document.getElementById('wagonAttk').value = '0';document.getElementById('wagonDef').value = '0';document.getElementById('ballistaAttk').value = '0';document.getElementById('ballistaDef').value = '0';
		   document.getElementById('siegeRamAttk').value = '0';document.getElementById('siegeRamDef').value = '0';document.getElementById('catapultAttk').value = '0';document.getElementById('catapultDef').value = '0';
		   document.getElementById('trebuchetAttk').value = '0';document.getElementById('trebuchetDef').value = '0';document.getElementById('wallDefOil').value = '0';document.getElementById('wallDefTraps').value = '0';
		   document.getElementById('wallDefAbatis').value = '0';document.getElementById('wallDefAts').value = '0';document.getElementById('wallDefDts').value = '0';
		}
	</script>

<?php
	include 'baseStats.php';
	include 'battleBonuses.php';
	include 'upgradedStats.php';
	include 'functions.php';
	include 'heroStats.php';

	/* ------------------------------------------------------------TROOP AMOUNT INPUT------------------------------------------------------------- */
	
	echo "<h1>Battle Simulator</h1>";
	echo "<div id='topDiv' style='top:0'>";
	echo "<div id='troopInputs'>";
	echo "<table>";
	echo "<form action='battle.php' method='post' target='_blank'>";
	echo "<tr><td><b>Attackers</b></td><td></td><td><b>Defenders</b></td><td></td></tr>";
	echo "<tr><td>Militia</td><td><input type='text' name='militiaAttk' id='militiaAttk' value='0'></td><td>Militia</td><td><input type='text' name='militiaDef' id='militiaDef' value='0'></td></tr>";
	echo "<tr><td>Clubmen</td><td><input type='text' name='clubmenAttk' id='clubmenAttk' value='0'></td><td>Clubmen</td><td><input type='text' name='clubmenDef' id='clubmenDef' value='0'></td></tr>";
	echo "<tr><td>Pikemen</td><td><input type='text' name='pikemenAttk' id='pikemenAttk' value='0'></td><td>Pikemen</td><td><input type='text' name='pikemenDef' id='pikemenDef' value='0'></td></tr>";
	echo "<tr><td>Swordsman</td><td><input type='text' name='swordsmanAttk' id='swordsmanAttk' value='0'></td><td>Swordsman</td><td><input type='text' name='swordsmanDef' id='swordsmanDef' value='0'></td></tr>";
	echo "<tr><td>Scouts</td><td><input type='text' name='scoutsAttk' id='scoutsAttk' value='0'></td><td>Scouts</td><td><input type='text' name='scoutsDef' id='scoutsDef' value='0'></td></tr>";
	echo "<tr><td>Archer</td><td><input type='text' name='archerAttk' id='archerAttk' value='0'></td><td>Archer</td><td><input type='text' name='archerDef' id='archerDef' value='0'></td></tr>";
	echo "<tr><td>Crossbowmen</td><td><input type='text' name='crossbowmenAttk' id='crossbowmenAttk' value='0'></td><td>Crossbowmen</td><td><input type='text' name='crossbowmenDef' id='crossbowmenDef' value='0'></td></tr>";
	echo "<tr><td>Cav-Archer</td><td><input type='text' name='cavArcherAttk' id='cavArcherAttk' value='0'></td><td>Cav-Archer</td><td><input type='text' name='cavArcherDef' id='cavArcherDef' value='0'></td></tr>";
	echo "<tr><td>Light-Cav</td><td><input type='text' name='lightCavAttk' id='lightCavAttk' value='0'></td><td>Light-Cav</td><td><input type='text' name='lightCavDef' id='lightCavDef' value='0'></td></tr>";
	echo "<tr><td>Knight</td><td><input type='text' name='knightAttk' id='knightAttk' value='0'></td><td>Knight</td><td><input type='text' name='knightDef' id='knightDef' value='0'></td></tr>";
	echo "<tr><td>Wagon</td><td><input type='text' name='wagonAttk' id='wagonAttk' value='0'></td><td>Wagon</td><td><input type='text' name='wagonDef' id='wagonDef' value='0'></td></tr>";
	echo "<tr><td>Ballista</td><td><input type='text' name='ballistaAttk' id='ballistaAttk' value='0'></td><td>Ballista</td><td><input type='text' name='ballistaDef' id='ballistaDef' value='0'></td></tr>";
	echo "<tr><td>Siege Ram</td><td><input type='text' name='siegeRamAttk' id='siegeRamAttk' value='0'></td><td>Siege Ram</td><td><input type='text' name='siegeRamDef' id='siegeRamDef' value='0'></td></tr>";
	echo "<tr><td>Catapult</td><td><input type='text' name='catapultAttk' id='catapultAttk' value='0'></td><td>Catapult</td><td><input type='text' name='catapultDef' id='catapultDef' value='0'></td></tr>";
	echo "<tr><td>Trebuchet</td><td><input type='text' name='trebuchetAttk' id='trebuchetAttk' value='0'></td><td>Trebuchet</td><td><input type='text' name='trebuchetDef' id='trebuchetDef' value='0'></td></tr>";
	echo "<tr><td></td><td></td><td><b>Wall Defence</b></td><td></td></tr>";
	echo "<tr><td></td><td></td><td>Burning Oil</td><td><input type='text' name='wallDefOil' id='wallDefOil' value='0'></td></tr>";
	echo "<tr><td></td><td></td><td>Traps</td><td><input type='text' name='wallDefTraps' id='wallDefTraps' value='0'></td></tr>";
	echo "<tr><td></td><td></td><td>Abatis</td><td><input type='text' name='wallDefAbatis' id='wallDefAbatis' value='0'></td></tr>";
	echo "<tr><td></td><td></td><td>Archer Towers</td><td><input type='text' name='wallDefAts' id='wallDefAts' value='0'></td></tr>";
	echo "<tr><td></td><td></td><td>Defensive Trebuchets</td><td><input type='text' name='wallDefDts' id='wallDefDts' value='0'></td></tr>";
	echo "</table><br><br>";
	echo "</div>";
	
	echo "<div id='techInputs' style='position:fixed;top:15;left:650'>";
	echo "<table>";
	echo "<tr><th>Technology (Attackers)</th><th>Level</th><th>Technology (Defenders)</th><th>Level</th><th>What it does</th></tr>";
	echo "<tr><td>Discipline</td><td><input type='text' id='tech1Attk' name='tech1Attk' value='0'></td><td>Discipline</td><td><input type='text' id='tech1Def' name='tech1Def' value='0'></td></td><td>Increases attack damage of all troops (2.5% per level)</td></tr>";
	echo "<tr><td>Swordsmanship</td><td><input type='text' id='tech2Attk' name='tech2Attk' value='0'></td><td>Swordsmanship</td><td><input type='text' id='tech2Def' name='tech2Def' value='0'></td></td><td>Increases attack damage of all melee troops (5% per level)</td></tr>";
	echo "<tr><td>Endurance</td><td><input type='text' id='tech3Attk' name='tech3Attk' value='0'></td><td>Endurance</td><td><input type='text' id='tech3Def' name='tech3Def' value='0'></td></td><td>Increases speed of all foot troops (5% per level)</td></tr>";
	echo "<tr><td>Horse shoes</td><td><input type='text' id='tech4Attk' name='tech4Attk' value='0'></td><td>Horse shoes</td><td><input type='text' id='tech4Def' name='tech4Def' value='0'></td></td><td>Increases speed of all mounted troops (5% per level)</td></tr>";
	echo "<tr><td>Drill</td><td><input type='text' id='tech5Attk' name='tech5Attk' value='0'></td><td>Drill</td><td><input type='text' name='tech5Def' id='tech5Def' value='0'></td></td><td>Increases speed of all mechanical units (5% per level)</td></tr>";
	echo "<tr><td>Plate armour</td><td><input type='text' id='tech6Attk' name='tech6Attk' value='0'></td><td>Plate armour</td><td><input type='text' id='tech6Def' name='tech6Def' value='0'></td></td><td>Increases defence of all troops (5% per level)</td></tr>";
	echo "<tr><td>Fletching</td><td><input type='text' id='tech7Attk' name='tech7Attk' value='0'></td><td>Fletching</td><td><input type='text' id='tech7Def' name='tech7Def' value='0'></td></td><td>Increases range of all arrows/bolts (5% per level)</td></tr>";
	echo "<tr><td>Broadhead arrows</td><td><input type='text' id='tech8Attk' name='tech8Attk' value='0'></td><td>Broadhead arrows</td><td><input type='text' id='tech8Def' name='tech8Def' value='0'></td></td><td>Increases attack damage of all arrows (5% per level)</td></tr>";
	echo "<tr><td>Horse back riding</td><td><input type='text' id='tech9Attk' name='tech9Attk' value='0'></td><td>Horse back riding</td><td><input type='text' id='tech9Def' name='tech9Def' value='0'></td></td><td>Increases attack damage of all mounted troops (5% per level)</td></tr>";
	echo "<tr><td>Siege engineering</td><td><input type='text' id='tech10Attk' name='tech10Attk' value='0'></td><td>Siege engineering</td><td><input type='text' id='tech10Def' name='tech10Def' value='0'></td></td><td>Increases range of siege weapons (5% per level)</td></tr>";
	echo "<tr><td>Chemistry</td><td><input type='text' id='tech11Attk' name='tech11Attk' value='0'></td><td>Chemistry</td><td><input type='text' id='tech11Def' name='tech11Def' value='0'></td></td><td>Increases attack damage of siege weapons (5% per level)</td></tr>";
	echo "<tr><td>Medicine</td><td><input type='text' id='tech12Attk' name='tech12Attk' value='0'></td><td>Medicine</td><td><input type='text' id='tech12Def' name='tech12Def' value='0'></td></td><td>Increases troops hitpoints (Not siege units) (5% per level)</td></tr>";
	echo "<tr><td>Animal Hides</td><td><input type='text' id='tech13Attk' name='tech13Attk' value='0'></td><td>Animal Hides</td><td><input type='text' id='tech13Def' name='tech13Def' value='0'></td></td><td>Increases siege hitpoints (5% per level)</td></tr>";
	echo "<tr><td></td><td></td><td>Wall Level</td><td><input type='text' id='wallDefWalls' name='wallDefWalls' value='0'></td></td><td>Increases range of defending troops (5% per level)</td></tr>";
	echo "<tr><td></td><td></td><td>Moat Level</td><td><input type='text' id='wallDefMoat' name='wallDefMoat' value='0'></td></td><td>Slows down all nearby attackers (-5% speed per level)</td></tr>";
	echo "</table><br><b>Heroes (Attack - Defence)</b><br><br>";
	echo "<table><th>Attack (attk)</th><th>Tactics (attk)</th><th>Attack (def)</th><th>Tactics (def)</th>";
	echo "<tr><td><input type='text' id='heroAttkAttk' name='heroAttkAttk' value='0'></td><td><input type='text' id='heroTacAttk' name='heroTaxAttk' value='0'></td><td><input type='text' id='heroAttkDef' name='heroAttkDef' value='0'></td><td><input type='text' id='heroTacDef' name='heroTacDef' value='0'></td></tr>";
	echo "</table>";
	echo "</div>";
	echo "<input type='submit' value='	Battle	   '>";
	echo "</form><button onclick='setTechMax()'>	Set Techs To Max	</button><button onclick='setTechZero()'>	Set Techs To Zero	</button><button onclick='setTroopsZero()'>	Set Troops To Zero	</button>";
	echo "</div>";
	/* --------------------------------------------------------- INCOMING GAME VARIABLES --------------------------------------------------------- */

	//Incoming Variables (Will come from POST) - (Arrays values include technologies)
		//ORDER Outer index = troop type (0 = Militia | 1 = Clubmen | 2 = Pikemen | 3 = Swordsman | 4 = Scout | 5 = Archer | 6 = Crossbowmen
		//								  7 = Cav-Archer | 8 = Light Cav | 9 = Knight | 10 = Wagon | 11 = Balista | 12 = Ram | 13 = Catapult | 14 = Trebs)
			//Inner index = (0 = Amount | 1 = HP | 2 = ATTK | 3 = RANGE | 4 = SPEED | 5 = CURRENT LOCATION)
			$attackArray = array(array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0));
			$defendArray = array(array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),
			array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0));
			//(0 = oil | 1 = traps | 2 = Abatis | 3 = At's | 4 = Dt's)
			$wallArray = array(0,0,0,0,0);
		//Battle Type 
			//0 = Field | Starting range is the highest range of defending troops | First attackers is random 
			$battleType = 0;
			
	//Hero Stats
		//Name || Attk || Tactics || Current Exp || Level
		$heroAttack = array("Name",0,0,0,0);
		$heroDefend = array("Name",0,0,0,0);
		if(isset($_POST['heroAttkAttk'])) { $heroAttack[1] = intval($_POST['heroAttkAttk']); }if(isset($_POST['heroTacAttk'])) { $heroAttack[2] = intval($_POST['heroTacAttk']); }
		if(isset($_POST['heroAttkDef'])) { $heroDefend[1] = intval($_POST['heroAttkDef']); }if(isset($_POST['heroTacDef'])) { $heroDefend[2] = intval($_POST['heroTacDef']); }
			
	//Technology Array
	$technologyArrayAttack = array(0,0,0,0,0,0,0,0,0,0,0,0,0);
	$technologyArrayDefend = array(0,0,0,0,0,0,0,0,0,0,0,0,0);
	
	//Walls/Moat
	$wallsLevel = 0;
	$moatLevel = 0;
	if(isset($_POST['wallDefWalls'])) { $wallsLevel = intval($_POST['wallDefWalls']); };
	if(isset($_POST['wallDefMoat'])) { $moatLevel = intval($_POST['wallDefMoat']); };
	
	if(isset($_POST['wallDefOil'])) { $wallArray[0] = intval($_POST['wallDefOil']); };if(isset($_POST['wallDefTraps'])) { $wallArray[1] = intval($_POST['wallDefTraps']); };
	if(isset($_POST['wallDefAbatis'])) { $wallArray[2] = intval($_POST['wallDefAbatis']); };if(isset($_POST['wallDefAts'])) { $wallArray[3] = intval($_POST['wallDefAts']); };
	if(isset($_POST['wallDefDts'])) { $wallArray[4] = intval($_POST['wallDefDts']); };
	
	$startingWallArray = $wallArray;
	
	if(isset($_POST['tech1Attk'])) { $technologyArrayAttack[0] = intval($_POST['tech1Attk']); };if(isset($_POST['tech2Attk'])) { $technologyArrayAttack[1] = intval($_POST['tech2Attk']); };
	if(isset($_POST['tech3Attk'])) { $technologyArrayAttack[2] = intval($_POST['tech3Attk']); };if(isset($_POST['tech4Attk'])) { $technologyArrayAttack[3] = intval($_POST['tech4Attk']); };
	if(isset($_POST['tech5Attk'])) { $technologyArrayAttack[4] = intval($_POST['tech5Attk']); };if(isset($_POST['tech6Attk'])) { $technologyArrayAttack[5] = intval($_POST['tech6Attk']); };
	if(isset($_POST['tech7Attk'])) { $technologyArrayAttack[6] = intval($_POST['tech7Attk']); };if(isset($_POST['tech8Attk'])) { $technologyArrayAttack[7] = intval($_POST['tech8Attk']); };
	if(isset($_POST['tech9Attk'])) { $technologyArrayAttack[8] = intval($_POST['tech9Attk']); };if(isset($_POST['tech10Attk'])) { $technologyArrayAttack[9] = intval($_POST['tech10Attk']); };
	if(isset($_POST['tech11Attk'])) { $technologyArrayAttack[10] = intval($_POST['tech11Attk']); };if(isset($_POST['tech12Attk'])) { $technologyArrayAttack[11] = intval($_POST['tech12Attk']); };
	if(isset($_POST['tech13Attk'])) { $technologyArrayAttack[12] = intval($_POST['tech13Attk']); };
	
	if(isset($_POST['tech1Def'])) { $technologyArrayDefend[0] = intval($_POST['tech1Def']); };if(isset($_POST['tech2Def'])) { $technologyArrayDefend[1] = intval($_POST['tech2Def']); };
	if(isset($_POST['tech3Def'])) { $technologyArrayDefend[2] = intval($_POST['tech3Def']); };if(isset($_POST['tech4Def'])) { $technologyArrayDefend[3] = intval($_POST['tech4Def']); };
	if(isset($_POST['tech5Def'])) { $technologyArrayDefend[4] = intval($_POST['tech5Def']); };if(isset($_POST['tech6Def'])) { $technologyArrayDefend[5] = intval($_POST['tech6Def']); };
	if(isset($_POST['tech7Def'])) { $technologyArrayDefend[6] = intval($_POST['tech7Def']); };if(isset($_POST['tech8Def'])) { $technologyArrayDefend[7] = intval($_POST['tech8Def']); };
	if(isset($_POST['tech9Def'])) { $technologyArrayDefend[8] = intval($_POST['tech9Def']); };if(isset($_POST['tech10Def'])) { $technologyArrayDefend[9] = intval($_POST['tech10Def']); };
	if(isset($_POST['tech11Def'])) { $technologyArrayDefend[10] = intval($_POST['tech11Def']); };if(isset($_POST['tech12Def'])) { $technologyArrayDefend[11] = intval($_POST['tech12Def']); };
	if(isset($_POST['tech13Def'])) { $technologyArrayDefend[12] = intval($_POST['tech13Def']); };
	
	//If troop numbers have been edited	
	
	if(isset($_POST['militiaAttk'])) { $tempArray = $attackArray[0];$tempArray[0] = intval($_POST['militiaAttk']);$attackArray[0] = $tempArray; }
	if(isset($_POST['clubmenAttk'])) { $tempArray = $attackArray[1];$tempArray[0] = intval($_POST['clubmenAttk']);$attackArray[1] = $tempArray; }
	if(isset($_POST['pikemenAttk'])) { $tempArray = $attackArray[2];$tempArray[0] = intval($_POST['pikemenAttk']);$attackArray[2] = $tempArray; }
	if(isset($_POST['swordsmanAttk'])) { $tempArray = $attackArray[3];$tempArray[0] = intval($_POST['swordsmanAttk']);$attackArray[3] = $tempArray; }
	if(isset($_POST['scoutsAttk'])) { $tempArray = $attackArray[4];$tempArray[0] = intval($_POST['scoutsAttk']);$attackArray[4] = $tempArray; }
	if(isset($_POST['archerAttk'])) { $tempArray = $attackArray[5];$tempArray[0] = intval($_POST['archerAttk']);$attackArray[5] = $tempArray; }
	if(isset($_POST['crossbowmenAttk'])) { $tempArray = $attackArray[6];$tempArray[0] = intval($_POST['crossbowmenAttk']);$attackArray[6] = $tempArray; }
	if(isset($_POST['cavArcherAttk'])) { $tempArray = $attackArray[7];$tempArray[0] = intval($_POST['cavArcherAttk']);$attackArray[7] = $tempArray; }
	if(isset($_POST['lightCavAttk'])) { $tempArray = $attackArray[8];$tempArray[0] = intval($_POST['lightCavAttk']);$attackArray[8] = $tempArray; }
	if(isset($_POST['knightAttk'])) { $tempArray = $attackArray[9];$tempArray[0] = intval($_POST['knightAttk']);$attackArray[9] = $tempArray; }
	if(isset($_POST['wagonAttk'])) { $tempArray = $attackArray[10];$tempArray[0] = intval($_POST['wagonAttk']);$attackArray[10] = $tempArray; }
	if(isset($_POST['ballistaAttk'])) { $tempArray = $attackArray[11];$tempArray[0] = intval($_POST['ballistaAttk']);$attackArray[11] = $tempArray; }
	if(isset($_POST['siegeRamAttk'])) { $tempArray = $attackArray[12];$tempArray[0] = intval($_POST['siegeRamAttk']);$attackArray[12] = $tempArray; }
	if(isset($_POST['catapultAttk'])) { $tempArray = $attackArray[13];$tempArray[0] = intval($_POST['catapultAttk']);$attackArray[13] = $tempArray; }
	if(isset($_POST['trebuchetAttk'])) { $tempArray = $attackArray[14];$tempArray[0] = intval($_POST['trebuchetAttk']);$attackArray[14] = $tempArray; }
	if(isset($_POST['militiaDef'])) { $tempArray = $defendArray[0];$tempArray[0] = intval($_POST['militiaDef']);$defendArray[0] = $tempArray; }
	if(isset($_POST['clubmenDef'])) { $tempArray = $defendArray[1];$tempArray[0] = intval($_POST['clubmenDef']);$defendArray[1] = $tempArray; }
	if(isset($_POST['pikemenDef'])) { $tempArray = $defendArray[2];$tempArray[0] = intval($_POST['pikemenDef']);$defendArray[2] = $tempArray; }
	if(isset($_POST['swordsmanDef'])) { $tempArray = $defendArray[3];$tempArray[0] = intval($_POST['swordsmanDef']);$defendArray[3] = $tempArray; }
	if(isset($_POST['scoutsDef'])) { $tempArray = $defendArray[4];$tempArray[0] = intval($_POST['scoutsDef']);$defendArray[4] = $tempArray; }
	if(isset($_POST['archerDef'])) { $tempArray = $defendArray[5];$tempArray[0] = intval($_POST['archerDef']);$defendArray[5] = $tempArray; }
	if(isset($_POST['crossbowmenDef'])) { $tempArray = $defendArray[6];$tempArray[0] = intval($_POST['crossbowmenDef']);$defendArray[6] = $tempArray; }
	if(isset($_POST['cavArcherDef'])) { $tempArray = $defendArray[7];$tempArray[0] = intval($_POST['cavArcherDef']);$defendArray[7] = $tempArray; }
	if(isset($_POST['lightCavDef'])) { $tempArray = $defendArray[8];$tempArray[0] = intval($_POST['lightCavDef']);$defendArray[8] = $tempArray; }
	if(isset($_POST['knightDef'])) { $tempArray = $defendArray[9];$tempArray[0] = intval($_POST['knightDef']);$defendArray[9] = $tempArray; }
	if(isset($_POST['wagonDef'])) { $tempArray = $defendArray[10];$tempArray[0] = intval($_POST['wagonDef']);$defendArray[10] = $tempArray; }
	if(isset($_POST['ballistaDef'])) { $tempArray = $defendArray[11];$tempArray[0] = intval($_POST['ballistaDef']);$defendArray[11] = $tempArray; }
	if(isset($_POST['siegeRamDef'])) { $tempArray = $defendArray[12];$tempArray[0] = intval($_POST['siegeRamDef']);$defendArray[12] = $tempArray; }
	if(isset($_POST['catapultDef'])) { $tempArray = $defendArray[13];$tempArray[0] = intval($_POST['catapultDef']);$defendArray[13] = $tempArray; }
	if(isset($_POST['trebuchetDef'])) { $tempArray = $defendArray[14];$tempArray[0] = intval($_POST['trebuchetDef']);$defendArray[14] = $tempArray; }

	//Full all troop stats
	forEach ($defendArray as $troopType=>$troopArray) {
		if($troopArray[0] > 0) {
			$returnStats = returnBaseStat($troopType,$technologyArrayDefend,$heroDefend);
			$troopArray[1] = ($returnStats[0]+round($returnStats[4]/2));//HP + 1/2 of DEFENCE
			$troopArray[2] = $returnStats[1];//ATTK
			$troopArray[3] = $returnStats[2];//RANGE
			$troopArray[4] = $returnStats[3];//SPEED
			$troopArray[6] = $returnStats[4];//DEFENCE
			$troopArray[7] = $returnStats[5];//LOAD
			$troopArray[8] = $returnStats[7];//FOOD COST
			$troopArray[9] = $returnStats[8];//LUMBER COST
			$troopArray[10] = $returnStats[9];//IRON COST
			$troopArray[11] = $returnStats[10];//STONE COST
			$troopArray[12] = $returnStats[11];//GOLD COST
			$defendArray[$troopType] = $troopArray;
		}
	}
	
	forEach ($attackArray as $troopType=>$troopArray) {
		if($troopArray[0] > 0) {
			$returnStats = returnBaseStat($troopType,$technologyArrayAttack,$heroAttack);
			$troopArray[1] = ($returnStats[0]+round($returnStats[4]/2));//HP + 1/2 of DEFENCE
			$troopArray[2] = $returnStats[1];//ATTK
			$troopArray[3] = $returnStats[2];//RANGE
			$troopArray[4] = $returnStats[3];//SPEED
			$troopArray[6] = $returnStats[4];//DEFENCE
			$troopArray[7] = $returnStats[5];//LOAD
			$troopArray[8] = $returnStats[7];//FOOD COST
			$troopArray[9] = $returnStats[8];//LUMBER COST
			$troopArray[10] = $returnStats[9];//IRON COST
			$troopArray[11] = $returnStats[10];//STONE COST
			$troopArray[12] = $returnStats[11];//GOLD COST
			$attackArray[$troopType] = $troopArray;
		}
	}
			
	
	//Temp storage of troops for battle report
		$attackArrayReport = $attackArray;
		$defendArrayReport = $defendArray;
	//Debug Log
		$debugLog = array();

	/* --------------------------------------------------------- PRE-BATTLE RANGE CONFIG --------------------------------------------------------- */
	
	//Set current location based on battle type and troops ranges
		//BattleRange varibles
			$battleRange = 0;
		//Get battle range	
			switch($battleType) {
				case 0:
					forEach($defendArray as $troopType=>$troopArray) {
						if($troopArray[0] > 0) {
							$upgradedRange = returnBaseStat($troopType,$technologyArrayDefend,$heroDefend);
							if($upgradedRange[2] > $battleRange) {
								$battleRange = $upgradedRange[2];
								//echo "troop type " . getTroopType($troopType) . "returning start range of " . $battleRange;
							}
						}
					}
				break;
			}
			//Add walls level to range
			$battleRange = $battleRange + (($battleRange*0.05)*$wallsLevel);
			//Increase starting range if traps/abatis are present
			if(($wallArray[1] > 0)||($wallArray[2] > 0)) {
				$battleRange = 500;
			}
			//Archer towers range
			if(($battleRange < 100)&&($wallArray[3] > 0)) {
				$battleRange = 100;
			}
		//Set attackers positions to battle range
			forEach ($attackArray as $troopType=>$troopArray) {
				$troopArray[5] = $battleRange;
				$attackArray[$troopType] = $troopArray;
			}
	
	/* ------------------------------------------------------------------ BATTLE ---------------------------------------------------------------- */
	
	//Battle
		//Constant battle variables
			$MAXROUNDS = 100;
		//Global battle variables
			$round = 0;
			$attackTroopsCount = 0;
			$defendTroopsCount = 0;
		//Calculate total number of troops on each side
			forEach ($attackArray as $miniArray) {
				$attackTroopsCount += $miniArray[0];
			};
			forEach ($defendArray as $miniArray) {
				$defendTroopsCount += $miniArray[0];
			};
			
		//Store troop arrays into temp variables
			$attackArrayTemp = $attackArray;
			$defendArrayTemp = $defendArray;
			
		//Battle while loop
		while(((($wallArray[3] > 0)||($defendTroopsCount > 0))&&($attackTroopsCount > 0))&&($round < 100)) {
		
			//Set temp troop amounts to real troop amounts
				//$attackArray = $attackArrayTemp;
				//$defendArray = $defendArrayTemp;
		
			//echo "Attacking Troop count = " . $attackTroopsCount . " || Defending Troop count = " . $defendTroopsCount . "<br>";
			//Defenders move if no one is there range
				forEach ($defendArray as $troopType=>$troopArray) {
					if($troopArray[0] > 0) {
						//Is something in range of the troop? If so, don't move
						$willMove = true;//By default a troop will move
						forEach ($attackArray as $attackTroopType=>$attackTroopArray) {
							if($wallsLevel > 0) {
								$troopsRangeReach = (($troopArray[5] + $troopArray[3]) + ((($troopArray[5] + $troopArray[3])*0.05)*$wallsLevel));
							} else {
								$troopsRangeReach = ($troopArray[5] + $troopArray[3]);
							}
							if($troopsRangeReach >= ($attackTroopArray[5])) {
								$willMove = false;
							}
						}
						
						//Set up troops new location
						if($willMove) {
								$newLocation = $troopArray[5] + $troopArray[4];
								//Make sure moving troop does not walk past attackers
								forEach ($attackArray as $attackTroopType=>$attackTroopArray) {
									if($attackTroopArray[0] > 0) {
										if($newLocation > $attackTroopArray[5]) {
											$newLocation = $attackTroopArray[5];
										}
									}
								}
							$logText = "Round " . ($round+1) . " | defence troop type " . getTroopType($troopType) . " is not in range, so he will moved from " . $troopArray[5] . " to " . $newLocation;
							array_push($debugLog,$logText);
							$troopArray[5] = $newLocation;
							$defendArray[$troopType] = $troopArray;//Put troops updated array back into the main defending troop array
						} else {
							$logText = "Round " . ($round+1) . " | defence troop type " . getTroopType($troopType) . " is in range, and will not move";
							array_push($debugLog,$logText);
						}
					}
				}
				
			//Attackers move if no one is there range
				forEach ($attackArray as $troopType=>$troopArray) {
					//Is something in range of the troop?
					if($troopArray[0] > 0) {
						$willMove = true;//By default a troop will move
						forEach ($defendArray as $defendTroopType=>$defendTroopArray) {
							if(((($troopArray[5] - $troopArray[3]) <= ($defendTroopArray[5]))&&($defendTroopArray[0] > 0))||(($troopArray[5] - $troopArray[3]) < 0)) {
								$willMove = false;
							}
						}
						
						//Set up troops new location
						if($willMove) {
								$newLocation = $troopArray[5] - $troopArray[4];
								//Make sure moving troop does not walk past defenders
								forEach ($defendArray as $defendTroopType=>$defendTroopArray) {
									if($defendTroopArray[0] > 0) {
										if($newLocation < $defendTroopArray[5]) {
											$newLocation = $defendTroopArray[5];
										}
									}
								}
							$logText = "Round " . ($round+1) . " | attack troop type " . getTroopType($troopType) . " is not in range, so he will moved to the new range of " . $newLocation;
							array_push($debugLog,$logText);
							$troopArray[5] = $newLocation;
							$attackArray[$troopType] = $troopArray;//Put troops updated array back into the main attacking troop array
						} else {
							$logText = "Round " . ($round+1) . " | attack troop type " . getTroopType($troopType) . " is in range, and will not move";
							array_push($debugLog,$logText);
						}
					}
				}
				
			//Set temp troop amounts to real troop amounts
				$attackArrayTemp = $attackArray;
				$defendArrayTemp = $defendArray;
			
			//Defending Troops Attack
				forEach ($defendArray as $troopType=>$troopArray) {
					//Is something in range to attack?
					$targetTroop = 500;//Default of 500 means nothing is in range and don't attack
					$tempSpeed = 0;
					forEach ($attackArray as $attackTroopType=>$attackTroopArray) {
						if($wallsLevel > 0) {
								$troopsRangeReach = (($troopArray[5] + $troopArray[3]) + ((($troopArray[5] + $troopArray[3])*0.05)*$wallsLevel));
							} else {
								$troopsRangeReach = ($troopArray[5] + $troopArray[3]);
							}
						if(($troopsRangeReach >= ($attackTroopArray[5]))&&($attackTroopArray[0] > 0)&&($troopArray[0] > 0)) {
							if($attackTroopArray[4] > $tempSpeed) {
								$tempSpeed = $attackTroopArray[4];
								$targetTroop = $attackTroopType;
								$targetTroopRange = ($attackTroopArray[5] - $troopArray[5]);
							}
						}
					}
					//Something is in range, attack it
					if($targetTroop != 500) {
						$targetTroopArray = $attackArray[$targetTroop];//Array of target troops stats
						$targetTroopsTotalHP = ($targetTroopArray[0]*$targetTroopArray[1]);
						$fightingTroopsTotalAttack = round($troopArray[0]*$troopArray[2]);
						$fightingTroopsTotalAttack = attackBonuses($fightingTroopsTotalAttack,$troopType,$targetTroop,$targetTroopRange);//echo "Defenders: Attk = " . $fightingTroopsTotalAttack . "| HP = " . $targetTroopsTotalHP . "<br>";
						//Are all target troops wiped by this attack?
							if($fightingTroopsTotalAttack >= $targetTroopsTotalHP) {
								$logText = "Round " . ($round+1) . " | defending troop type " . getTroopType($troopType) . " has attacked and wiped out attacking troop type " . getTroopType($targetTroop);
								array_push($debugLog,$logText);
								$targetTroopArray[0] = 0;//Set target troops to zero
								$attackArrayTemp[$targetTroop] = $targetTroopArray;//Insert updated array back into temp array of attack troops;
							} else {
								//If all targeted troops are not killed, work out how many remain alive
								$logText = "Round " . ($round+1) . " | defending troop type " . getTroopType($troopType) . " has attacked attacking troop type " . getTroopType($targetTroop);
								array_push($debugLog,$logText);
								$remainingTargetHP = $targetTroopsTotalHP-$fightingTroopsTotalAttack;
								$remainingTargetTroops = floor($remainingTargetHP/$targetTroopArray[1]);
								$targetTroopArray[0] = $remainingTargetTroops;//Set target troops to remaining value
								$attackArrayTemp[$targetTroop] = $targetTroopArray;//Insert updated array back into temp array of attack troops
							}
					}
				}

			//Wall defence attacks
				
				//OIL
				if($wallArray[0] > 0) {
					$OIL_RANGE = 20;
					$OIL_MAXDEATHS = 10;
					$oilDamage = ($wallArray[0]*$OIL_MAXDEATHS);
					forEach ($attackArrayTemp as $attackTroopType=>$attackTroopArray) {
						if($attackTroopArray[0] > 0) {
							if($attackTroopArray[5] <= $OIL_RANGE) {
								$randNum = rand(0,$oilDamage);
								$attackTroopArray[0] = $attackTroopArray[0] - $randNum;
								if($attackTroopArray[0] < 0) {
									$attackTroopArray[0] = 0;
								}
							$logText = "Round " . ($round+1) . " | Wall defence (Oil) has attacked attacking troop type " . getTroopType($attackTroopType) . " killing " . $randNum . " of them";
							array_push($debugLog,$logText);
							$wallArray[0] = $wallArray[0] - round($randNum/10);
							if($wallArray[0] < 0) {$wallArray[0] = 0;}
							$attackArrayTemp[$attackTroopType] = $attackTroopArray;
							}
						}
					}
				}
				
				//TRAPS
				if($wallArray[1] > 0) {
					$TRAP_RANGE = 500;
					$TRAP_MAXDEATHS = 4;
					$TRAP_DOUBLEDAMAGE = array (0,1,2);
					$TRAP_NORMALDAMAGE = array (3,5,6);
					$trapDamage = ($wallArray[1]*$TRAP_MAXDEATHS);
					forEach ($attackArrayTemp as $attackTroopType=>$attackTroopArray) {
						if($attackTroopArray[0] > 0) {
							if($attackTroopArray[5] <= $TRAP_RANGE) {
								$randNum = rand(0,$trapDamage);
								if(in_array($attackTroopType,$TRAP_DOUBLEDAMAGE)) {
									$attackTroopArray[0] = $attackTroopArray[0] - $randNum;
									$logText = "Round " . ($round+1) . " | Wall defence (Traps) has attacked attacking troop type " . getTroopType($attackTroopType) . " killing " . $randNum . " of them";
									array_push($debugLog,$logText);
								}
								if(in_array($attackTroopType,$TRAP_NORMALDAMAGE)) {
									$attackTroopArray[0] = $attackTroopArray[0] - round($randNum/2);
									$logText = "Round " . ($round+1) . " | Wall defence (Traps) has attacked attacking troop type " . getTroopType($attackTroopType) . " killing " . round($randNum/2) . " of them";
									array_push($debugLog,$logText);
								}
								if($attackTroopArray[0] < 0) {
									$attackTroopArray[0] = 0;
								}
							$wallArray[1] = $wallArray[1] - round($randNum/10);
							if($wallArray[1] < 0) {$wallArray[1] = 0;}
							$attackArrayTemp[$attackTroopType] = $attackTroopArray;
							}
						}
					}
				}
				
				//Abatis
				if($wallArray[2] > 0) {
					$ABATIS_RANGE = 500;
					$ABATIS_MAXDEATHS = 4;
					$ABATIS_DOUBLEDAMAGE = array (7,8);
					$ABATIS_NORMALDAMAGE = array (9);
					$abatisDamage = ($wallArray[2]*$ABATIS_MAXDEATHS);
					forEach ($attackArrayTemp as $attackTroopType=>$attackTroopArray) {
						if($attackTroopArray[0] > 0) {
							if($attackTroopArray[5] <= $ABATIS_RANGE) {
								$randNum = rand(0,$abatisDamage);
								if(in_array($attackTroopType,$ABATIS_DOUBLEDAMAGE)) {
									$attackTroopArray[0] = $attackTroopArray[0] - $randNum;
									$logText = "Round " . ($round+1) . " | Wall defence (Abatis) has attacked attacking troop type " . getTroopType($attackTroopType) . " killing " . $randNum . " of them";
									array_push($debugLog,$logText);
								}
								if(in_array($attackTroopType,$ABATIS_NORMALDAMAGE)) {
									$attackTroopArray[0] = $attackTroopArray[0] - round($randNum/2);
									$logText = "Round " . ($round+1) . " | Wall defence (Abatis) has attacked attacking troop type " . getTroopType($attackTroopType) . " killing " . round($randNum/2) . " of them";
									array_push($debugLog,$logText);
								}
								if($attackTroopArray[0] < 0) {
									$attackTroopArray[0] = 0;
								}
							$wallArray[2] = $wallArray[2] - round($randNum/10);
							if($wallArray[2] < 0) {$wallArray[2] = 0;}
							$attackArrayTemp[$attackTroopType] = $attackTroopArray;
							}
						}
					}
				}
				
				//Archer Towers
				if($wallArray[3] > 0) {
					$TOWER_RANGE = 200;
					$TOWER_MAXDEATHS = 10;
					$TOWER_DOUBLEDAMAGE = array (0,1,2,3,4);
					$towerDamage = ($wallArray[3]*$TOWER_MAXDEATHS);
					forEach ($attackArrayTemp as $attackTroopType=>$attackTroopArray) {
						if($attackTroopArray[0] > 0) {
							if($attackTroopArray[5] <= $TOWER_RANGE) {
								$randNum = rand(0,$towerDamage);
								if(in_array($attackTroopType,$TOWER_DOUBLEDAMAGE)) {
									$attackTroopArray[0] = $attackTroopArray[0] - round($randNum*2);
									$logText = "Round " . ($round+1) . " | Wall defence (Archer Towers) has attacked attacking troop type " . getTroopType($attackTroopType) . " killing " . ($randNum*2) . " of them";
									array_push($debugLog,$logText);
								} else {
									$attackTroopArray[0] = $attackTroopArray[0] - round($randNum);
									$logText = "Round " . ($round+1) . " | Wall defence (Archer Towers) has attacked attacking troop type " . getTroopType($attackTroopType) . " killing " . round($randNum) . " of them";
									array_push($debugLog,$logText);
								}
								if($attackTroopArray[0] < 0) {
									$attackTroopArray[0] = 0;
								}
							$attackArrayTemp[$attackTroopType] = $attackTroopArray;
							}
						}
					}
				}
				
			//Are defending troops wiped but wall defence remains?
				$defendTroopsCount = 0;
					forEach ($defendArrayTemp as $miniArray) {
						$defendTroopsCount += $miniArray[0];
					};
				if(($defendTroopsCount == 0)&&($wallArray[3] > 0)) {
					forEach ($attackArray as $troopType=>$troopArray) {
						if(($troopArray[5] < 10)&&($wallArray[3] > 0)) {
							$wallArray[3] = 0;
							$logText = "Round " . ($round+1) . " | attack troop type " . getTroopType($troopType) . " has attacked and wiped out defending archer towers";
							array_push($debugLog,$logText);
						}
					}
				}
	
			//Attacking Troops Attack
				forEach ($attackArray as $troopType=>$troopArray) {
					//Is something in range to attack?
					$targetTroop = 500;//Default of 500 means nothing is in range and don't attack
					$tempSpeed = 0;
					forEach ($defendArray as $defendTroopType=>$defendTroopArray) {
						if((($troopArray[5] - $troopArray[3]) <= ($defendTroopArray[5]))&&($defendTroopArray[0] > 0)&&($troopArray[0] > 0)) {
							if($defendTroopArray[4] > $tempSpeed) {
								$tempSpeed = $defendTroopArray[4];
								$targetTroop = $defendTroopType;
								$targetTroopRange = ($troopArray[5] - $defendTroopArray[5]);
							}
						}
					}
					//Something is in range, attack it
					if($targetTroop != 500) {
						$targetTroopArray = $defendArray[$targetTroop];//Array of target troops stats
						$targetTroopsTotalHP = round($targetTroopArray[0]*$targetTroopArray[1]);
						$fightingTroopsTotalAttack = round($troopArray[0]*$troopArray[2]);//echo "target troop range = " . $targetTroopRange;
						$fightingTroopsTotalAttack = attackBonuses($fightingTroopsTotalAttack,$troopType,$targetTroop,$targetTroopRange);//echo "Attackers: Attk = " . $fightingTroopsTotalAttack . "| HP = " . $targetTroopsTotalHP . "<br>";
						//Are all target troops wiped by this attack?
							if($fightingTroopsTotalAttack >= $targetTroopsTotalHP) {
								$logText = "Round " . ($round+1) . " | attack troop type " . getTroopType($troopType) . " has attacked and wiped out defending troop type " . getTroopType($targetTroop);
								array_push($debugLog,$logText);
								$targetTroopArray[0] = 0;//Set target troops to zero
								$defendArrayTemp[$targetTroop] = $targetTroopArray;//Insert updated array back into temp array of attack troops
							} else {
								//If all targeted troops are not killed, work out how many remain alive
								$remainingTargetHP = $targetTroopsTotalHP-$fightingTroopsTotalAttack;
								$remainingTargetTroops = floor($remainingTargetHP/$targetTroopArray[1]);
								$targetTroopArray[0] = $remainingTargetTroops;//Set target troops to remaining value
								$defendArrayTemp[$targetTroop] = $targetTroopArray;//Insert updated array back into temp array of attack troops
								$logText = "Round " . ($round+1) . " | attack troop type " . getTroopType($troopType) . " has attacked defending troop type " . getTroopType($targetTroop);
								array_push($debugLog,$logText);
							}
					} 
				}
				
			//Attackers attack Archer Towers
			if($wallArray[3] > 0) {
				forEach ($attackArray as $troopType=>$troopArray) {
					//Can troop attack archer towers
					if((($troopArray[5] - $troopArray[3]) <= 0)&&($troopArray[0] > 0)) {
						$fightingTroopsTotalAttack = ($troopArray[0]*$troopArray[2]);
						$towersTotalHP = $wallArray[3]*2000;//Towers HP equals 2000, needs to become a variable
						if($fightingTroopsTotalAttack >= $towersTotalHP) {
							//All towers are wiped
							$logText = "Round " . ($round+1) . " | attack troop type " . getTroopType($troopType) . " has attacked and wiped out defending archer towers";
							array_push($debugLog,$logText);
							$wallArray[3] = 0;
						} else {
							$remainingTargetHP = $towersTotalHP-$fightingTroopsTotalAttack;
							$remainingTowers = floor($remainingTargetHP/2000);
							$logText = "Round " . ($round+1) . " | attack troop type " . getTroopType($troopType) . " has attacked and destroyed " . ($wallArray[3] - $remainingTowers) . " defending archer towers";
							array_push($debugLog,$logText);
							$wallArray[3] = $remainingTowers;
						}
					}
				}
			}
							
				
			//Calculate troop amounts
				$attackTroopsCount = 0;
				forEach ($attackArrayTemp as $miniArray) {
					$attackTroopsCount += $miniArray[0];
				};
				
			//Set temp troop amounts to real troop amounts
				$attackArray = $attackArrayTemp;
				$defendArray = $defendArrayTemp;
			
			//echo "Remaining Attackers = " . $attackTroopsCount . " | Remaining Defenders = " . $defendTroopsCount . "<br>";
			$round++;
			//echo "<br>";
			//echo '<pre>',print_r($defendArrayTemp[5]),'</pre>';	
			//echo "<br>";
		}


	//Debug Print outs
	
	echo "<div id='bottomDiv'";
	echo "<div id='div1' style='float:left'>";
	echo "<br><b>Battle Report Info<b><br><br>";
	echo "Attackers<br><br>";
	echo "<table><th>Troop Type</th><th>Total</th><th>Survivors</th><th>Killed</th>";
	forEach ($attackArrayReport as $troopType=>$troopArray) {
		echo "<tr>";
		$remainingTroops = $attackArray[$troopType];
		switch($troopType) {
			case 0:
				echo "<td>Militia</td><td>" . $troopArray[0] . "</td><td>" . $remainingTroops[0] . "</td><td>" . ($troopArray[0] - $remainingTroops[0]) . "</td>";
				break;
			case 1:
				echo "<td>Clubmen</td><td>" . $troopArray[0] . "</td><td>" . $remainingTroops[0] . "</td><td>" . ($troopArray[0] - $remainingTroops[0]) . "</td>";
				break;
			case 2:
				echo "<td>Pikemen</td><td>" . $troopArray[0] . "</td><td>" . $remainingTroops[0] . "</td><td>" . ($troopArray[0] - $remainingTroops[0]) . "</td>";
				break;
			case 3:
				echo "<td>Swordsman</td><td>" . $troopArray[0] . "</td><td>" . $remainingTroops[0] . "</td><td>" . ($troopArray[0] - $remainingTroops[0]) . "</td>";
				break;
			case 4:
				echo "<td>Scouts</td><td>" . $troopArray[0] . "</td><td>" . $remainingTroops[0] . "</td><td>" . ($troopArray[0] - $remainingTroops[0]) . "</td>";
				break;
			case 5:
				echo "<td>Archers</td><td>" . $troopArray[0] . "</td><td>" . $remainingTroops[0] . "</td><td>" . ($troopArray[0] - $remainingTroops[0]) . "</td>";
				break;
			case 6:
				echo "<td>Crossbowmen</td><td>" . $troopArray[0] . "</td><td>" . $remainingTroops[0] . "</td><td>" . ($troopArray[0] - $remainingTroops[0]) . "</td>";
				break;
			case 7:
				echo "<td>Cav-Archer</td><td>" . $troopArray[0] . "</td><td>" . $remainingTroops[0] . "</td><td>" . ($troopArray[0] - $remainingTroops[0]) . "</td>";
				break;
			case 8:
				echo "<td>Light-Cav</td><td>" . $troopArray[0] . "</td><td>" . $remainingTroops[0] . "</td><td>" . ($troopArray[0] - $remainingTroops[0]) . "</td>";
				break;
			case 9:
				echo "<td>Knight</td><td>" . $troopArray[0] . "</td><td>" . $remainingTroops[0] . "</td><td>" . ($troopArray[0] - $remainingTroops[0]) . "</td>";
				break;
			case 10:
				echo "<td>Wagon</td><td>" . $troopArray[0] . "</td><td>" . $remainingTroops[0] . "</td><td>" . ($troopArray[0] - $remainingTroops[0]) . "</td>";
				break;
			case 11:
				echo "<td>Ballista</td><td>" . $troopArray[0] . "</td><td>" . $remainingTroops[0] . "</td><td>" . ($troopArray[0] - $remainingTroops[0]) . "</td>";
				break;
			case 12:
				echo "<td>Siege Ram</td><td>" . $troopArray[0] . "</td><td>" . $remainingTroops[0] . "</td><td>" . ($troopArray[0] - $remainingTroops[0]) . "</td>";
				break;
			case 13:
				echo "<td>Catapult</td><td>" . $troopArray[0] . "</td><td>" . $remainingTroops[0] . "</td><td>" . ($troopArray[0] - $remainingTroops[0]) . "</td>";
				break;
			case 14:
				echo "<td>Trebuchet</td><td>" . $troopArray[0] . "</td><td>" . $remainingTroops[0] . "</td><td>" . ($troopArray[0] - $remainingTroops[0]) . "</td>";
				break;
		}
		echo "</tr>";
	}
	echo "</table>";
	
	//Get winner information
	$attackTroopsCount = 0;
	forEach ($attackArray as $miniArray) {
		$attackTroopsCount += $miniArray[0];
	};
	if($round == 100) {
		echo "<br>Defenders won, round limit of 100 was reached";
	} else {
		if($attackTroopsCount > 0) {
			echo "<br>Attackers won, battle took " . $round . " rounds";
		} else {
			echo "<br>Defenders won, battle took " . $round . " rounds";
		}
	}
	//echo "<br>";
	//echo '<pre>',print_r($attackArray[0]),'</pre>';	
	//echo "<br>";
	
	//Calc EXP gain by Victor
	$expAmount = 0;
	if($attackTroopsCount > 0) {
		forEach ($defendArray as $troopType=>$valueArray) {
			if(count($valueArray) > 8) {//If array is greater than 8, this means that troop type battled and had his stats loaded
				$startingNumArray = $attackArrayReport[$troopType];//Get amount of starting troops of this type
				$expAmount += round((($valueArray[8]+$valueArray[9]+$valueArray[10]+$valueArray[11]+$valueArray[12])*$startingNumArray[0])/100);//Calulation to get exp value
			}
		}
	} else {
		forEach ($attackArray as $troopType=>$valueArray) {
			if(count($valueArray) > 8) {
				$startingNumArray = $attackArrayReport[$troopType];
				$expAmount += round((($valueArray[8]+$valueArray[9]+$valueArray[10]+$valueArray[11]+$valueArray[12])*$startingNumArray[0])/100);
			}
		}
	}
	
	echo "<br>Exp Gain : " . $expAmount . "<br>";
	
	echo "<br><br>Battle started at a range of " . $battleRange;
	
	echo "</div>";
	
	echo "<div id='div2' style='float:left;padding-left:50px'>";
	echo "<br>Defenders<br><br><br><br>";
	echo "<table><th>Troop Type</th><th>Total</th><th>Survivors</th><th>Killed</th>";
	forEach ($defendArrayReport as $troopType=>$troopArray) {
		echo "<tr>";
		$remainingTroops = $defendArray[$troopType];
		switch($troopType) {
			case 0:
				echo "<td>Militia</td><td>" . $troopArray[0] . "</td><td>" . $remainingTroops[0] . "</td><td>" . ($troopArray[0] - $remainingTroops[0]) . "</td>";
				break;
			case 1:
				echo "<td>Clubmen</td><td>" . $troopArray[0] . "</td><td>" . $remainingTroops[0] . "</td><td>" . ($troopArray[0] - $remainingTroops[0]) . "</td>";
				break;
			case 2:
				echo "<td>Pikemen</td><td>" . $troopArray[0] . "</td><td>" . $remainingTroops[0] . "</td><td>" . ($troopArray[0] - $remainingTroops[0]) . "</td>";
				break;
			case 3:
				echo "<td>Swordsman</td><td>" . $troopArray[0] . "</td><td>" . $remainingTroops[0] . "</td><td>" . ($troopArray[0] - $remainingTroops[0]) . "</td>";
				break;
			case 4:
				echo "<td>Scouts</td><td>" . $troopArray[0] . "</td><td>" . $remainingTroops[0] . "</td><td>" . ($troopArray[0] - $remainingTroops[0]) . "</td>";
				break;
			case 5:
				echo "<td>Archers</td><td>" . $troopArray[0] . "</td><td>" . $remainingTroops[0] . "</td><td>" . ($troopArray[0] - $remainingTroops[0]) . "</td>";
				break;
			case 6:
				echo "<td>Crossbowmen</td><td>" . $troopArray[0] . "</td><td>" . $remainingTroops[0] . "</td><td>" . ($troopArray[0] - $remainingTroops[0]) . "</td>";
				break;
			case 7:
				echo "<td>Cav-Archer</td><td>" . $troopArray[0] . "</td><td>" . $remainingTroops[0] . "</td><td>" . ($troopArray[0] - $remainingTroops[0]) . "</td>";
				break;
			case 8:
				echo "<td>Light-Cav</td><td>" . $troopArray[0] . "</td><td>" . $remainingTroops[0] . "</td><td>" . ($troopArray[0] - $remainingTroops[0]) . "</td>";
				break;
			case 9:
				echo "<td>Knight</td><td>" . $troopArray[0] . "</td><td>" . $remainingTroops[0] . "</td><td>" . ($troopArray[0] - $remainingTroops[0]) . "</td>";
				break;
			case 10:
				echo "<td>Wagon</td><td>" . $troopArray[0] . "</td><td>" . $remainingTroops[0] . "</td><td>" . ($troopArray[0] - $remainingTroops[0]) . "</td>";
				break;
			case 11:
				echo "<td>Ballista</td><td>" . $troopArray[0] . "</td><td>" . $remainingTroops[0] . "</td><td>" . ($troopArray[0] - $remainingTroops[0]) . "</td>";
				break;
			case 12:
				echo "<td>Siege Ram</td><td>" . $troopArray[0] . "</td><td>" . $remainingTroops[0] . "</td><td>" . ($troopArray[0] - $remainingTroops[0]) . "</td>";
				break;
			case 13:
				echo "<td>Catapult</td><td>" . $troopArray[0] . "</td><td>" . $remainingTroops[0] . "</td><td>" . ($troopArray[0] - $remainingTroops[0]) . "</td>";
				break;
			case 14:
				echo "<td>Trebuchet</td><td>" . $troopArray[0] . "</td><td>" . $remainingTroops[0] . "</td><td>" . ($troopArray[0] - $remainingTroops[0]) . "</td>";
				break;
		}
		echo "</tr>";
	}
	echo "<tr><td>------</td><td>-----</td><td>-----</td><td>----</td></tr>";
	echo "<tr><td>Burning Oil</td><td>" . $startingWallArray[0] . "</td><td>" . $wallArray[0] . "</td><td>" . ($startingWallArray[0] - $wallArray[0]) . "</td></tr>";
	echo "<tr><td>Traps</td><td>" . $startingWallArray[1] . "</td><td>" . $wallArray[1] . "</td><td>" . ($startingWallArray[1] - $wallArray[1]) . "</td></tr>";
	echo "<tr><td>Abatis</td><td>" . $startingWallArray[2] . "</td><td>" . $wallArray[2] . "</td><td>" . ($startingWallArray[2] - $wallArray[2]) . "</td></tr>";
	echo "<tr><td>Archer Towers</td><td>" . $startingWallArray[3] . "</td><td>" . $wallArray[3] . "</td><td>" . ($startingWallArray[3] - $wallArray[3]) . "</td></tr>";
	echo "<tr><td>Defensive Trebuchets</td><td>" . $startingWallArray[4] . "</td><td>" . $wallArray[4] . "</td><td>" . ($startingWallArray[4] - $wallArray[4]) . "</td></tr>";
	echo "</table><br><br>";
	forEach ($debugLog as $debugLine) {
		echo $debugLine;
		echo "<br>";
	}
	echo "</div>";
	
	echo "</div>";
	
	//Line 529 (Damage done to AT's when all defending troops are wiped
?>

