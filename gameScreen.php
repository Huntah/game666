<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css"/>
<link rel="stylesheet" href="cityPlots.css"/>
<?
require_once "../include/server/functionsBasic.php";
require_once "resourceFunctionsPhp/functionResourceProductions.php";
session_start();
$_SESSION['userID'] = 1;
$userID = $_SESSION['userID'];

$cityFocusX=2;
$cityFocusY=0;
$updateCity=0;

$conn = new mysqli($dbhost,$dbuser,$dbpswd,$dbname);
	if ($conn->connect_error)
	{
		die("Connection Failed: " . $conn->connect_error);
	}

date_default_timezone_set('NZ');
	
$result = $conn->query("SELECT * FROM players WHERE userID='$userID'");
$result = mysqli_fetch_assoc($result);
$playerTechsEco = explode (',',$result['playerTechsEco']);
$techPoints = $result['techPoints'];
$playerLastUpdate = $result['lastUpdate'];
$techPointsIncrease = $result['techPointsIncrease'];

$dateCurrent = new DateTime();
$dteLastUpdate = new DateTime($playerLastUpdate);
$diffInSeconds = $dateCurrent->getTimestamp() - $dteLastUpdate->getTimestamp() - 7200;

$ticks = floor($diffInSeconds/2);

//Calculate how many tech points the city should now have
$techPoints = $techPoints + ($techPointsIncrease*$ticks);
if($techPoints > 2200) {
	$techPoints = 2200;
}

$result = $conn->query("UPDATE players SET techPoints='$techPoints' WHERE userID='$userID'");
	
//SET UP ARRAYS FOR NEARBY MAP OBJECTS
$coordsXArray = array();
$coordsYArray = array();
$typeArray = array();
$ownerArray = array();
$result = $conn->query("SELECT * FROM map");
while ($row = $result->fetch_array()) {
	array_push ($coordsXArray,$row['coordX']);
	array_push ($coordsYArray,$row['coordY']);
	array_push ($typeArray,$row['type']);
	array_push ($ownerArray,$row['owner']);
}

//SET UP PLAYERS SELECTED CITY DETAILS
$result = $conn->query("SELECT * FROM cities WHERE cityCoordX='$cityFocusX' AND cityCoordY='$cityFocusY'");
$result = mysqli_fetch_assoc($result);
$cityID = $result['cityID'];
$cityName = $result['cityName'];
$cityContent = $result['cityContent'];
$cityContentTrend = $result['cityContentTrend'];
$cityResourceLumber = $result['cityResourceLumber'];
$cityResourceFood = $result['cityResourceFood'];
$cityResourceIron = $result['cityResourceIron'];
$cityResourceStone = $result['cityResourceStone'];
$cityResourceGold= $result['cityResourceGold'];
$cityLastUpdate = $result['cityLastUpdate'];
$cityPopulation = $result['cityPopulation'];
$cityType = $result['cityType'];
$cityBuildTime = $result['cityBuildTime'];
$cityBuildStr = $result['cityBuildStr'];
$currentArea = $result['currentArea'];

$dateCurrent = new DateTime();
$dteLastUpdate = new DateTime($cityLastUpdate);
$diffInSeconds = $dateCurrent->getTimestamp() - $dteLastUpdate->getTimestamp() - 7200;
$cityBuildTime = $cityBuildTime - $diffInSeconds;

if($cityBuildTime < 0) {
	$cityBuildTime=0;
}

//SET UP PLAYERS SELECTED CITIES BUILDINGS DETAILS
$result = $conn->query("SELECT * FROM citytiles WHERE cityID='$cityID'");
$result = mysqli_fetch_assoc($result);

//KEEP FIRST
$counter = 0;
$counterMax = 6;//Number of tiles in the keep plus 1
$buildingArrayKeep = array();
while($counter < $counterMax) {
	$currentBuilding = "tileBuilding" . $counter;
	$currentLevel = "tileLevel" . $counter;
	$miniArray = array();
	array_push($miniArray,$result[$currentBuilding]);
	array_push($miniArray,$result[$currentLevel]);
	array_push($buildingArrayKeep,$miniArray);
	$counter++;
	if(($miniArray[0] != 0)&&($miniArray[1] == 0)) {
		$currentArea = "keep";
		if($cityBuildTime == 0) {
			$updateCity=1;
		}
	}
	/*  -- - --- -- STUFF ABOUT UPDATING BUILDING HERE -- --- - --  */
	if(($miniArray[0] != 0)&&($miniArray[1] > 100)) {
		$currentArea = "keep";
		if($cityBuildTime == 0) {
			$updateCity=1;
		}
	}
}
//RESOURCES
$counterMax = 12;//Number of tiles in the resource fields plus 1
$buildingArrayResources = array();
while($counter < $counterMax) {
	$currentBuilding = "tileBuilding" . $counter;
	$currentLevel = "tileLevel" . $counter;
	$miniArray = array();
	array_push($miniArray,$result[$currentBuilding]);
	array_push($miniArray,$result[$currentLevel]);
	array_push($buildingArrayResources,$miniArray);
	if(($miniArray[0] != 0)&&($miniArray[1] == 0)) {
		$currentArea = "resources";
		if($cityBuildTime == 0) {
			$updateCity=1;
		}
	}
	/*  -- - --- -- STUFF ABOUT UPDATING BUILDING HERE -- --- - --  */
	if(($miniArray[0] != 0)&&($miniArray[1] > 100)) {
		$currentArea = "resources";
		if($cityBuildTime == 0) {
			$updateCity=1;
		}
	}
	$counter++;
}

//HOUSES
$counterMax = 18;//Number of tiles in the houses fields plus 1
$buildingArrayHouses = array();
while($counter < $counterMax) {
	$currentBuilding = "tileBuilding" . $counter;
	$currentLevel = "tileLevel" . $counter;
	$miniArray = array();
	array_push($miniArray,$result[$currentBuilding]);
	array_push($miniArray,$result[$currentLevel]);
	array_push($buildingArrayHouses,$miniArray);
	if(($miniArray[0] != 0)&&($miniArray[1] == 0)) {
		$currentArea = "houses";
		if($cityBuildTime == 0) {
			$updateCity=1;
		}
	}
	/*  -- - --- -- STUFF ABOUT UPDATING BUILDING HERE -- --- - --  */
	if(($miniArray[0] != 0)&&($miniArray[1] > 100)) {
		$currentArea = "houses";
		if($cityBuildTime == 0) {
			$updateCity=1;
		}
	}
	$counter++;
}

//MILITARY
$counterMax = 24;//Number of tiles in the military fields plus 1
$buildingArrayMilitary = array();
while($counter < $counterMax) {
	$currentBuilding = "tileBuilding" . $counter;
	$currentLevel = "tileLevel" . $counter;
	$miniArray = array();
	array_push($miniArray,$result[$currentBuilding]);
	array_push($miniArray,$result[$currentLevel]);
	array_push($buildingArrayMilitary,$miniArray);
	if(($miniArray[0] != 0)&&($miniArray[1] == 0)) {
		$currentArea = "military";
		if($cityBuildTime == 0) {
			$updateCity=1;
		}
	}
	$counter++;
}

//Get Total Poss Population
$populationValues = array (100,250,500,1000,2000,4000,8000,16000,32000,64000,128000);
$totalPossPopulation = 0;
forEach ($buildingArrayHouses as $value) {
	$miniArray = $value;
	if(($miniArray[0] == 1)&&($miniArray[1] > 0)&&($miniArray[1] < 101)) {
		$totalPossPopulation = $totalPossPopulation + $populationValues[$miniArray[1]];
	}
	if(($miniArray[0] == 1)&&($miniArray[1] > 100)) {
		$totalPossPopulation = $totalPossPopulation + $populationValues[($miniArray[1]-100)];
	}
}
//Calculate how much population in city should now be

//temp tax
$taxRate = 25;
$cityContentTarget = 100 - $taxRate;

//Calulate Content
//echo $cityContent . " || " . $cityContentTarget . " || " . $ticks;
if($cityContent > $cityContentTarget) {
	$cityContent = $cityContent - ($ticks);
	if($cityContent < $cityContentTarget) {$cityContent = $cityContentTarget;}
} else {
	if($cityContent < $cityContentTarget) {
		$cityContent = $cityContent + ($ticks);
		if($cityContent > $cityContentTarget) {$cityContent = $cityContentTarget;}
	} else {
		$cityContent < $cityContentTarget;
	}
}

//POPULATION IS HALVING ON EVERY SINGLE RELOAD, MUST BE TAX RATE THING ---------------- ITS CONTENT LEVEL LOWERING IT
$cityPopulation = $cityPopulation + (($ticks*($totalPossPopulation/180))*($cityContent/100));
if($cityPopulation > $totalPossPopulation*($cityContent/100)) {
	$cityPopulation = $totalPossPopulation*($cityContent/100);
}

$cityProductionGold = ($cityPopulation*($taxRate/100));

$resourceInfoArray = getResourceProductions($buildingArrayResources,$playerTechsEco,$cityResourceFood,$cityResourceLumber,$cityResourceIron,$cityResourceStone);

$cityProductionFood = $resourceInfoArray[0];
$cityProductionLumber = $resourceInfoArray[1];
$cityProductionIron = $resourceInfoArray[2];
$cityProductionStone = $resourceInfoArray[3];
/*
//WORK OUT PRODUCTION AMOUNTS
$productionValues = array (100,250,500,1000,2000,4000,8000,16000,32000,64000,128000);
$cityProductionFood = 100;
$cityProductionLumber = 100;
$cityProductionIron = 100;
$cityProductionStone = 100;

forEach ($buildingArrayResources as $value) {
	$miniArray = $value;
	if(($miniArray[0] == 1)&&($miniArray[1] > 0)&&($miniArray[1] < 101)) {
		$cityProductionFood = $cityProductionFood + $productionValues[$miniArray[1]];
	}
	if(($miniArray[0] == 2)&&($miniArray[1] > 0)&&($miniArray[1] < 101)) {
		$cityProductionLumber = $cityProductionLumber + $productionValues[$miniArray[1]];
	}
	if(($miniArray[0] == 3)&&($miniArray[1] > 0)&&($miniArray[1] < 101)) {
		$cityProductionIron = $cityProductionIron + $productionValues[$miniArray[1]];
	}
	if(($miniArray[0] == 4)&&($miniArray[1] > 0)&&($miniArray[1] < 101)) {
		$cityProductionStone = $cityProductionStone + $productionValues[$miniArray[1]];
	}
	//If a field is currently upgrade then....
	if(($miniArray[0] == 1)&&($miniArray[1] > 100)) {
		$increaseAmount = $miniArray[1] - 100;
		$cityProductionFood = $cityProductionFood + $productionValues[$increaseAmount];
	}
	if(($miniArray[0] == 2)&&($miniArray[1] > 100)) {
		$increaseAmount = $miniArray[1] - 100;
		$cityProductionLumber = $cityProductionLumber + $productionValues[$increaseAmount];
	}
	if(($miniArray[0] == 3)&&($miniArray[1] > 100)) {
		$increaseAmount = $miniArray[1] - 100;
		$cityProductionIron = $cityProductionIron + $productionValues[$increaseAmount];
	}
	if(($miniArray[0] == 4)&&($miniArray[1] > 100)) {
		$increaseAmount = $miniArray[1] - 100;
		$cityProductionStone = $cityProductionStone + $productionValues[$increaseAmount];
	}
}
*/

//Calculate how much resources the city should now have
$ticks = floor($diffInSeconds/2);
$cityResourceFood = $cityResourceFood + ($ticks*($cityProductionFood/180));
$cityResourceLumber = $cityResourceLumber + ($ticks*($cityProductionLumber/180));
$cityResourceIron = $cityResourceIron + ($ticks*($cityProductionIron/180));
$cityResourceStone = $cityResourceStone + ($ticks*($cityProductionStone/180));
$cityResourceGold = $cityResourceGold + ($ticks*($cityProductionGold/180));

$result = $conn->query("UPDATE cities SET cityContent='$cityContent', cityPopulation='$cityPopulation', cityBuildTime='$cityBuildTime', cityResourceFood='$cityResourceFood', cityResourceLumber='$cityResourceLumber', cityResourceIron='$cityResourceIron', cityResourceStone='$cityResourceStone', cityResourceGold='$cityResourceGold' WHERE cityCoordX='$cityFocusX' AND cityCoordY='$cityFocusY'");

?>

</head>
<body onload='loadArrays()' >
	<div id='container'>
		<div id='header'>test</div>	
		<div id='gameContainer'>
			<div id='sectionResourceDisplay'>
				<div id='sectionResourceDisplayLeft'>
				</div>
				<div id='sectionResourceDisplayRight'>
				</div>
				<div id='sectionResourceDisplayCenter'>
				</div>
			</div>
			<div id='menuLeft'>
				<div id='researchButtonDiv'>
					<img id='researchButton' src='images/buttons/buttonResearch.png' />
					<div id='researchPointsStr'></div>
				</div>
			</div>
			<div id='menuRight'>
			</div>
				<div id="canvasdiv" style="overflow: hidden">
					<div id='popUpCoord'></div>
					<div id='mapButtons'></div>
					<div id='popUpWarning'></div>
					<div id='popUpTownhall'></div>
					<div id='popUpSmallMenu'></div>
					<div id='testCityFortDiv'></div>
					<div id='testCityResourcesDiv'></div>
					<div id='testCityHousesDiv'></div>
					<div id='testCityMilitaryDiv'></div>
					<div id='techToolTip'></div>
					<div id='techConfirm'></div>
					<!-- BUILDING SHOP -->
					<div id='buildingShop'>
						<table style='height:100%'>
							<tr>
								<td style='min-width:400px;background-color:white;height:220px'><div id='buildingSelect0'></div></td><td style='min-width:400px;background-color:white'><div id='buildingSelect1'></div></td><td style='min-width:400px;background-color:white'><div id='buildingSelect2'></div></td>
							</tr>
							<tr>
								<td style='min-width:400px;background-color:white;height:220px'><div id='buildingSelect3'></div></td><td style='min-width:400px;background-color:white'><div id='buildingSelect4'></div></td><td style='min-width:400px;background-color:white'><div id='buildingSelect5'></div></td>
							</tr>
							<tr>
								<td style='min-width:400px;background-color:white;height:220px'><div id='buildingSelect6'></div></td><td style='min-width:400px;background-color:white'><div id='buildingSelect7'></div></td><td style='min-width:400px;background-color:white'><div id='buildingSelect8'></div></td>
							</tr>
						</table>
					</div>
					<!-- PLOTS -->
					<div id='keepTownhall'></div>
					<div id='keepPlot1'></div>
					<div id='keepPlot2'></div>
					<div id='keepPlot3'></div>
					<div id='keepPlot4'></div>
					<div id='keepPlot5'></div>
					<div id='keepPlot6'></div>
					<div id='resourcesPlot1'></div>
					<div id='resourcesPlot2'></div>
					<div id='resourcesPlot3'></div>
					<div id='resourcesPlot4'></div>
					<div id='resourcesPlot5'></div>
					<div id='resourcesPlot6'></div>
					<div id='housesPlot1'></div>
					<div id='housesPlot2'></div>
					<div id='housesPlot3'></div>
					<div id='housesPlot4'></div>
					<div id='housesPlot5'></div>
					<div id='housesPlot6'></div>
					<div id='militaryPlot1'></div>
					<div id='militaryPlot2'></div>
					<div id='militaryPlot3'></div>
					<div id='militaryPlot4'></div>
					<div id='militaryPlot5'></div>
					<div id='militaryPlot6'></div>
					<!-- PROGRESS BARS -->
					<div id='progressBars'>
						<p id='progressBar1Str' style='position:fixed;height:25px;top:670px;width:80%' ></p>
						<progress id='progressBar1' value='0' max='0' style='margin-left:10px;width:98%;height:25px;border:0' ></progress>
					</div>
					<canvas id='mainCanvas' width='0px' height='0px' ></canvas>
				</div>
			<div id='chatWindow'>
			</div>
		</div>
	</div>
<img id='testCastle' width='0px' height='0px' src='castle.jpg' />
<img id='testImage' width='0px' height='0px' src='mapGrid.jpg' />
<img id='testMenu' width='0px' height='0px' src='menu.jpg' />
<img id='testCity' width='0px' height='0px' src='cityBackground.jpg' />
<img id='testCityFort' width='0px' height='0px' src='images/cityparts/cityFort.png' />
<img id='testCityFortGlow' width='0px' height='0px' src='images/cityparts/cityFortGlow.png' />
<img id='testCityHouses' width='0px' height='0px' src='images/cityparts/cityHouses.png' />
<img id='testCityHousesGlow' width='0px' height='0px' src='images/cityparts/cityHousesGlow.png' />
<img id='testCityResources' width='0px' height='0px' src='images/cityparts/cityResources.png' />
<img id='testCityResourcesGlow' width='0px' height='0px' src='images/cityparts/cityResourcesGlow.png' />
<img id='testCityMilitary' width='0px' height='0px' src='images/cityparts/cityMilitary.png' />
<img id='testCityMilitaryGlow' width='0px' height='0px' src='images/cityparts/cityMilitaryGlow.png' />
<img id='testCityFortBackground' width='0px' height='0px' src='cityFortBackground.jpg' />
<img id='testCityResourcesBackground' width='0px' height='0px' src='cityResourcesBackground.jpg' />
<img id='testCityHousesBackground' width='0px' height='0px' src='cityHousesBackground.jpg' />
<img id='testCityMilitaryBackground' width='0px' height='0px' src='cityMilitaryBackground.jpg' />
<img id='testCityBuildingBase' width='0px' height='0px' src='buildingBase.png' />
<img id='testBuildingLibrary' width='0px' height='0px' src='images/buildings/buildingLibrary.png' />
<img id='testBuildingChurch' width='0px' height='0px' src='images/buildings/buildingChurch.png' />
<img id='testBuildingWarehouse' width='0px' height='0px' src='images/buildings/buildingWarehouse.png' />
<img id='testBuildingAcademyInfantry' width='0px' height='0px' src='images/buildings/buildingAcademyInfantry.png' />
<img id='testBuildingFoundation' width='0px' height='0px' src='images/buildings/foundation.png' />
<img id='testBuildingTownhall' width='0px' height='0px' src='images/buildings/buildingTownhall.png' />
<img id='testBuildingFarm' width='0px' height='0px' src='images/buildings/buildingFarm.png' />
<img id='testBuildingLumber' width='0px' height='0px' src='images/buildings/buildingLumber.png' />
<img id='testBuildingIron' width='0px' height='0px' src='images/buildings/buildingIron.png' />
<img id='testBuildingStone' width='0px' height='0px' src='images/buildings/buildingStone.png' />
<img id='testBuildingHouse' width='0px' height='0px' src='images/buildings/buildingHouse.png' />

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
<script src="JSFunctionsBasic.js"></script>
<script src="JSmapFunction.js"></script>
<script src="JSFunctionsHover.js"></script>
<script src="JSFunctionsGraphics.js"></script>
<script src="JSFunctionsResearchScreen.js"></script>
<script src="JSFunctionsOpenFort.js"></script>
<script src="JSFunctionBuildingShop.js"></script>
<script src="JSFunctionsProgressBars.js"></script>
<script src="JSFunctionsMousedown.js"></script>
<script src="JSFunctionsOpenTownhall.js"></script>
<script src="JSFunctionsOpenResources.js"></script>
<script src="JSFunctionsOpenHouses.js"></script>
<script src="JSFunctionsOpenMilitary.js"></script>
<script src="buildingFunctions/FunctionOpenBuilding.js"></script>
<script src="buildingFunctions/FunctionKeep.js"></script>
<script src="buildingFunctions/FunctionResources.js"></script>
<script src="buildingFunctions/FunctionHouses.js"></script>
<script type="text/javascript">

//setTimeout(function(){},2000);

lastX = 0;
lastY = 0;
imgHeight = 2000;
imgWidth = 2000;
popUpCoordActive = false;
mapOpened = false;
cityOpened = false;
keepOpened = false;
hideDivs();
shopOpened = false;
lastOpened = "";
progressBar1Value = 50;
progressBar1Max = 100;

function closeAll() {
	resetCursors();
	mapOpened = false;
	cityOpened = false;
	keepOpened = false;
	shopOpened = false;
	townhallOpened = false;
	resourcesOpened = false;
	housesOpened = false;
	militaryOpened = false;
	researchScreenOpened = false;
	document.getElementById('buildingShop').style.display = 'none';
	document.getElementById('popUpTownhall').style.display = 'none';
	document.getElementById('popUpSmallMenu').style.display = 'none';
	
	document.getElementById('buildingShop').style.zIndex = 0;
	document.getElementById("testCityFort").style.zIndex = 0;
	document.getElementById("testCityFortGlow").style.zIndex = 0;
	document.getElementById("testCityResources").style.zIndex = 0;
	document.getElementById("testCityResourcesGlow").style.zIndex = 0;
	document.getElementById("testCityHouses").style.zIndex = 0;
	document.getElementById("testCityHousesGlow").style.zIndex = 0;
	document.getElementById("testCityMilitary").style.zIndex = 0;
	document.getElementById("testCityMilitaryGlow").style.zIndex = 0;
	
	document.getElementById("keepTownhall").style.zIndex = 0;
	document.getElementById("keepPlot1").style.zIndex = 0;
	document.getElementById("keepPlot2").style.zIndex = 0;
	document.getElementById("keepPlot3").style.zIndex = 0;
	document.getElementById("keepPlot4").style.zIndex = 0;
	document.getElementById("keepPlot5").style.zIndex = 0;
	document.getElementById("keepPlot6").style.zIndex = 0;
	document.getElementById("resourcesPlot1").style.zIndex = 0;
	document.getElementById("resourcesPlot2").style.zIndex = 0;
	document.getElementById("resourcesPlot3").style.zIndex = 0;
	document.getElementById("resourcesPlot4").style.zIndex = 0;
	document.getElementById("resourcesPlot5").style.zIndex = 0;
	document.getElementById("resourcesPlot6").style.zIndex = 0;
	document.getElementById("housesPlot1").style.zIndex = 0;
	document.getElementById("housesPlot2").style.zIndex = 0;
	document.getElementById("housesPlot3").style.zIndex = 0;
	document.getElementById("housesPlot4").style.zIndex = 0;
	document.getElementById("housesPlot5").style.zIndex = 0;
	document.getElementById("housesPlot6").style.zIndex = 0;
	document.getElementById("militaryPlot1").style.zIndex = 0;
	document.getElementById("militaryPlot2").style.zIndex = 0;
	document.getElementById("militaryPlot3").style.zIndex = 0;
	document.getElementById("militaryPlot4").style.zIndex = 0;
	document.getElementById("militaryPlot5").style.zIndex = 0;
	document.getElementById("militaryPlot6").style.zIndex = 0;
}

function resetCursors() {
	document.getElementById("keepTownhall").style.cursor = "default";
	document.getElementById("keepPlot1").style.cursor = "default";
	document.getElementById("keepPlot2").style.cursor = "default";
	document.getElementById("keepPlot3").style.cursor = "default";
	document.getElementById("keepPlot4").style.cursor = "default";
	document.getElementById("keepPlot5").style.cursor = "default";
	document.getElementById("keepPlot6").style.cursor = "default";
	document.getElementById("resourcesPlot1").style.cursor = "default";
	document.getElementById("resourcesPlot2").style.cursor = "default";
	document.getElementById("resourcesPlot3").style.cursor = "default";
	document.getElementById("resourcesPlot4").style.cursor = "default";
	document.getElementById("resourcesPlot5").style.cursor = "default";
	document.getElementById("resourcesPlot6").style.cursor = "default";
	document.getElementById("housesPlot1").style.cursor = "default";
	document.getElementById("housesPlot2").style.cursor = "default";
	document.getElementById("housesPlot3").style.cursor = "default";
	document.getElementById("housesPlot4").style.cursor = "default";
	document.getElementById("housesPlot5").style.cursor = "default";
	document.getElementById("housesPlot6").style.cursor = "default";
	document.getElementById("militaryPlot1").style.cursor = "default";
	document.getElementById("militaryPlot2").style.cursor = "default";
	document.getElementById("militaryPlot3").style.cursor = "default";
	document.getElementById("militaryPlot4").style.cursor = "default";
	document.getElementById("militaryPlot5").style.cursor = "default";
	document.getElementById("militaryPlot6").style.cursor = "default";
}

function hideDivs() {
	document.getElementById('buildingShop').style.display = 'none';
	document.getElementById('popUpWarning').style.display = 'none';
	document.getElementById('progressBars').style.display = 'none';
}

function convertVariables() {
	cityName = '<? echo $cityName ?>';
	cityContent = <? echo $cityContent ?>;
	cityContentTrend = <? echo $cityContentTrend ?>;
	cityResourceLumber = <? echo $cityResourceLumber ?>;
	cityResourceFood = <? echo $cityResourceFood ?>;
	cityResourceIron = <? echo $cityResourceIron ?>;
	cityResourceStone = <? echo $cityResourceStone ?>;
	cityResourceGold = <? echo $cityResourceGold ?>;
	cityProductionLumber = <? echo $cityProductionLumber ?>;
	cityProductionFood = <? echo $cityProductionFood ?>;
	cityProductionIron = <? echo $cityProductionIron ?>;
	cityProductionStone = <? echo $cityProductionStone ?>;
	cityProductionGold = <? echo $cityProductionGold ?>;
	cityPopulation = <? echo $cityPopulation ?>;
	cityFocusX = <? echo $cityFocusX ?>;
	cityFocusY = <? echo $cityFocusY ?>;
	cityType = <? echo $cityType ?>;
	currentArea = '<? echo $currentArea ?>';
	cityBuildTime = <? echo $cityBuildTime ?>;
	cityBuildStr = '<? echo $cityBuildStr ?>';
	maxPossPopulation = <? echo $totalPossPopulation ?>;
	cityContentTarget = <? echo $cityContentTarget ?>;
	cityTaxRate = <? echo $taxRate ?>;
	techPoints = <? echo $techPoints ?>;
	techPointsIncrease = <? echo $techPointsIncrease ?>;
}

function loadArrays() {
	coordXArray = [];
	<? foreach ($coordsXArray as $cost) : ?>
	coordXArray.push(<? echo $cost?>);
	<? endforeach; ?>;
	coordYArray = [];
	<? foreach ($coordsYArray as $cost) : ?>
	coordYArray.push(<? echo $cost?>);
	<? endforeach; ?>;
	typeArray = [];
	<? foreach ($typeArray as $cost) : ?>
	typeArray.push(<? echo $cost?>);
	<? endforeach; ?>;
	ownerArray = [];
	<? foreach ($ownerArray as $cost) : ?>
	ownerArray.push('<? echo $cost?>');
	<? endforeach; ?>;
	buildingArrayKeep = <? echo json_encode($buildingArrayKeep); ?>;
	buildingArrayResources = <? echo json_encode($buildingArrayResources); ?>;
	buildingArrayHouses = <? echo json_encode($buildingArrayHouses); ?>;
	buildingArrayMilitary = <? echo json_encode($buildingArrayMilitary); ?>;
	playerTechsEco = <? echo json_encode($playerTechsEco); ?>;
	createBackground(1);//Creates the first background image
	addImages(1);//Add castles etc to the map
	convertVariables();//Convert php variables into js
	cityInfoDisplay();//Update the top display
	cityFunctionsLoop();//Begin loop to update display
	addMapButtons();//Add and set the map buttons
	if(<? echo $updateCity ?> == 1) {
		completeCityBuilding();
	}
	switch(currentArea) {
		case "keep":
		setTimeout(function(){openCityKeep()},200);
		break;
		case "resources":
		setTimeout(function(){openCityResources()},200);
		break;
		case "houses":
		setTimeout(function(){openCityHouses()},200);
		break;
		case "military":
		setTimeout(function(){openCityMilitary()},200);
		break;
		default:
		setTimeout(function(){openCity()},200);
	}
	setupProgressBars();
}

function addMapButtons() {
	var buttonHTML = "<table style='width:100%;height:100%'><tr><td style='width:50%'><center><button style='width:80%' id='buttonMap' onclick='openMap()'>Map</button></center></td><td style='width:50%'><center><button style='width:80%' id='buttonCity' onclick='openCity()'>City</button></center></td></tr></table>";
	document.getElementById('mapButtons').innerHTML=buttonHTML;
}

function openCity() {
	if(!cityOpened)//Change to opposite
	{
		createBackground(1);
		addImages(1);
		cityInfoDisplay();
		addMapButtons();
		closeAll();
		cityOpened = true;
		document.getElementById("testCityFort").style.zIndex = 50;
		document.getElementById("testCityFortGlow").style.zIndex = 50;
		document.getElementById("testCityResources").style.zIndex = 50;
		document.getElementById("testCityResourcesGlow").style.zIndex = 50;
		document.getElementById("testCityHouses").style.zIndex = 50;
		document.getElementById("testCityHousesGlow").style.zIndex = 50;
		document.getElementById("testCityMilitary").style.zIndex = 50;
		document.getElementById("testCityMilitaryGlow").style.zIndex = 50;
		var test = document.getElementById("testCityHousesDiv").style.zIndex;
		log(test);
	}
}

function getRegion() {
	var returnStr = "Unknown";
	if((cityFocusX < 8)&&(cityFocusY < 8)) {returnStr = "North West";}
	if((cityFocusX > 7)&&(cityFocusY < 8)) {returnStr = "North East";}
	if((cityFocusX < 8)&&(cityFocusY > 7)) {returnStr = "South West";}
	if((cityFocusX > 7)&&(cityFocusY > 7)) {returnStr = "South East";}
	return returnStr;
}

function getCityType() {
	var returnStr = "Unknown";
	switch(cityType)
	{
		case 1:
			returnStr = "Village";
			break;
	}
	return returnStr;
}

function cityInfoDisplay() {
	if(cityProductionGold > 0) {var cityProductionGoldStr = "<i style='color:green'> (" + Math.floor(cityProductionGold) + ")</i>";} else {var cityProductionGoldStr = "<i style='color:red'> (" + Math.floor(cityProductionGold) + ")</i>";};
	if(cityProductionFood > 0) {var cityProductionFoodStr = "<i style='color:green'> (" + Math.floor(cityProductionFood) + ")</i>";} else {var cityProductionFoodStr = "<i style='color:red'> (" + Math.floor(cityProductionFood) + ")</i>";};
	if(cityProductionLumber > 0) {var cityProductionLumberStr = "<i style='color:green'> (" + Math.floor(cityProductionLumber) + ")</i>";} else {var cityProductionLumberStr = "<i style='color:red'> (" + Math.floor(cityProductionLumber) + ")</i>";};
	if(cityProductionIron > 0) {var cityProductionIronStr = "<i style='color:green'> (" + Math.floor(cityProductionIron) + ")</i>";} else {var cityProductionIronStr = "<i style='color:red'> (" + Math.floor(cityProductionIron) + ")</i>";};
	if(cityProductionStone > 0) {var cityProductionStoneStr = "<i style='color:green'> (" + Math.floor(cityProductionStone) + ")</i>";} else {var cityProductionStoneStr = "<i style='color:red'> (" + Math.floor(cityProductionStone) + ")</i>";};
	//CENTER INFO
	var cityRegion = getRegion();
	var cityType = getCityType();
	
	var dataStrCenter = "<center><table style='width:100%'><tr><td style='width:25%'><center>City Content: " + cityContent + "</center></td><td style='width:50%;font-size:200%'><center><b>" + cityName + "</b></center></td><td style='width:25%'><center>Gold: " + Math.floor(cityResourceGold) + cityProductionGoldStr + "<br><i style='font-Size:80%'>TaxRate: " + cityTaxRate + "%</i></center></td></tr></table></center>";
	dataStrCenter = dataStrCenter + "<table style='width:100%'><tr><td style='width:25%'><center>Population: " + Math.floor(cityPopulation) + "/" + maxPossPopulation + "</center></td><td style='width:50%'><center>" + cityRegion + "</center></td><td style='width'25%'><center>" + cityType + "</center></td></tr></table>";
	//LEFT INFO
	var dataStrLeft = "<table style='width:100%;height:100%'><tr><td style='width:50%'><center>Food: " + Math.floor(cityResourceFood) + cityProductionFoodStr + "</center></td><td style='width:50%'><center>Lumber: " + Math.floor(cityResourceLumber) + cityProductionLumberStr + "</center></td></tr><tr><td style='width:50%'><center>Iron: " + Math.floor(cityResourceIron) + cityProductionIronStr + "</center></td><td style='width:50%'><center>Stone: " + Math.floor(cityResourceStone) + cityProductionStoneStr + "</center></td></tr></table>";
	
	var researchPointsSection = "Tech Points <br>" + techPoints;
	
	document.getElementById('sectionResourceDisplayCenter').innerHTML=dataStrCenter;
	document.getElementById('sectionResourceDisplayLeft').innerHTML=dataStrLeft;
	document.getElementById('researchPointsStr').innerHTML=researchPointsSection;
}

function cityFunctionsLoop() {
	cityFunctionsLoopObject = setTimeout(function(){cityFunctionsUpdate()},2000);
}

function cityFunctionsUpdate() {
	//Increase resources by their production value
	cityPopulation = cityPopulation + ((maxPossPopulation/180)*(cityContent/100));
	//log(maxPossPopulation*(cityContent/100));
	if(cityPopulation > (maxPossPopulation*(cityContent/100))) {
		cityPopulation = (maxPossPopulation*(cityContent/100));
	}
	if(cityContent > cityContentTarget) {
		cityContent = cityContent - 1;
	}
	if(cityContent < cityContentTarget) {
		cityContent = cityContent + 1;
	}
	if(techPoints < 2200) {
		techPoints = techPoints + techPointsIncrease;
	}
	if(techPoints > 2200) {
		techPoints = 2200;
	}
	cityResourceLumber = cityResourceLumber + (cityProductionLumber/180);
	cityResourceFood = cityResourceFood + (cityProductionFood/180);
	cityResourceIron = cityResourceIron + (cityProductionIron/180);
	cityResourceStone = cityResourceStone + (cityProductionStone/180);
	
	cityProductionGold = (cityPopulation*(cityTaxRate/100));
	
	cityResourceGold = cityResourceGold + (cityProductionGold/180);
	cityInfoDisplay();
	cityFunctionsLoop();
}

function createBackground(type) {
	var mapImage = new Image();
	canvas = document.getElementById("mainCanvas");
	context = canvas.getContext('2d');
	dragging = false;
	marginLeft = 0;
	marginTop = 0;
	if(type == 0) {//MAP
		marginLeft=0;
		marginTop=0;
		canvas.style.marginLeft = marginLeft
		canvas.style.marginTop = marginTop
		var img = document.getElementById('testImage');
		imgHeight = imgWidth = 2000;
		canvas.width=5000;
		canvas.height=5000;
	}
	if(type == 1) {//CITY
		marginLeft=0;
		marginTop=0;
		canvas.style.marginLeft = marginLeft
		canvas.style.marginTop = marginTop
		var img = document.getElementById('testCity');
		imgWidth = 1300;
		imgHeight = 600;
		canvas.width=imgWidth;
		canvas.height=imgHeight;
	}
	if(type == 2) {//CITY Keep
		marginLeft=0;
		marginTop=0;
		canvas.style.marginLeft = marginLeft
		canvas.style.marginTop = marginTop
		var img = document.getElementById('testCityFortBackground');
		imgWidth = 1300;
		imgHeight = 600;
		canvas.width=imgWidth;
		canvas.height=imgHeight;
	}
	if(type == 3) {//CITY resources
		marginLeft=0;
		marginTop=0;
		canvas.style.marginLeft = marginLeft
		canvas.style.marginTop = marginTop
		var img = document.getElementById('testCityResourcesBackground');
		imgWidth = 1300;
		imgHeight = 600;
		canvas.width=imgWidth;
		canvas.height=imgHeight;
	}
	if(type == 4) {//CITY houses
		marginLeft=0;
		marginTop=0;
		canvas.style.marginLeft = marginLeft
		canvas.style.marginTop = marginTop
		var img = document.getElementById('testCityHousesBackground');
		imgWidth = 1300;
		imgHeight = 600;
		canvas.width=imgWidth;
		canvas.height=imgHeight;
	}
	if(type == 5) {//CITY military
		marginLeft=0;
		marginTop=0;
		canvas.style.marginLeft = marginLeft
		canvas.style.marginTop = marginTop
		var img = document.getElementById('testCityMilitaryBackground');
		imgWidth = 1300;
		imgHeight = 600;
		canvas.width=imgWidth;
		canvas.height=imgHeight;
	}
	context.drawImage(img,0,0,imgWidth,imgHeight);
}

function log(log) {
	document.getElementById('chatWindow').innerHTML = log;
}

window.addEventListener('dblclick', function(e) {
	if(mapOpened) {
		var evt = e || event;
		var gameBox = document.querySelector("#canvasdiv"); 
		var position = getPosition(gameBox);
		var posY = marginTop + position.y;
		var posX = marginLeft + position.x;
		var currentClickX = evt.clientX - position.x + (marginLeft*-1);
		var currentClickY = evt.clientY - position.y + (marginTop*-1);
		var logString = "(" + currentClickX + "," + currentClickY + ") Top= (" + (marginTop*-1) + ") Left = (" + (marginLeft*-1) + ")";
		var coordX = Math.floor(currentClickX/125);
		var coordY = Math.floor(currentClickY/125);
		var logString = "DOUBLE CLICK (" + coordX + " x," + coordY + " y)";
		log(logString);
		openCoord(coordX,coordY);
	}
}, false);

function getMouseCoords(evt) {
	var gameBox = document.querySelector("#canvasdiv"); 
	var position = getPosition(gameBox);
	var posY = marginTop + position.y;
	var posX = marginLeft + position.x;
	var currentClickX = evt.clientX - position.x + (marginLeft*-1);
	var currentClickY = evt.clientY - position.y + (marginTop*-1);
	var logString = "(" + currentClickX + "," + currentClickY + ") Top= (" + (marginTop*-1) + ") Left = (" + (marginLeft*-1) + ")";
	var coordX = Math.floor(currentClickX/125);
	var coordY = Math.floor(currentClickY/125);
	var logString = "(" + coordX + " x," + coordY + " y)";
	//log(logString);
}

function getPosition(el) {
  var xPos = 0;
  var yPos = 0;
 
  while (el) {
    if (el.tagName == "BODY") {
      // deal with browser quirks with body/window/document and page scroll
      var xScroll = el.scrollLeft || document.documentElement.scrollLeft;
      var yScroll = el.scrollTop || document.documentElement.scrollTop;
 
      xPos += (el.offsetLeft - xScroll + el.clientLeft);
      yPos += (el.offsetTop - yScroll + el.clientTop);
    } else {
      // for all other non-BODY elements
      xPos += (el.offsetLeft - el.scrollLeft + el.clientLeft);
      yPos += (el.offsetTop - el.scrollTop + el.clientTop);
    }
 
    el = el.offsetParent;
  }
  return {
    x: xPos,
    y: yPos
  };
}

window.addEventListener('mousemove', function(e) {
	if(mapOpened) {
		if(!popUpCoordActive)
		{
			var evt = e || event;
			if (dragging) {
				var delta = evt.clientX - lastX;
				if((marginLeft <= 0)&&(marginLeft >= -670)) {
					lastX = evt.clientX;
					marginLeft += delta;
					canvas.style.marginLeft = marginLeft + "px";
				} else {
					if(marginLeft > 0) {
						marginLeft = 0;
					}
					if((marginLeft) < -670) {
						marginLeft = -670;
					}
				}
			}
			if (dragging) {
				var echo = evt.clientY - lastY;
				if((marginTop <= 0)&&(marginTop >= -1400)) {
					lastY = evt.clientY;
					marginTop += echo;
					canvas.style.marginTop = marginTop + "px";
				} else {
					if(marginTop > 0) {
						marginTop = 0;
					}
					if(marginTop < -1400) {
						marginTop = -1400;
					}
				}
			}
			e.preventDefault();
		}
	}
}, false);

window.addEventListener('mouseup', function() {
    dragging = false;
}, false);

</script>	
</body>
</html>