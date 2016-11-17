<!DOCTYPE html>
<html>
	<?php 
	date_default_timezone_set('NZ');
	require_once "functions/playerFunctions.php";
	
	//Database connect
	$dbhost = "119.252.191.145:3306";  
	$dbname = "ageOfNations";              
	$dbuser = "shawn";           		
	$dbpswd = "py9cbMLAQfy5zrPG"; 

	$conn = new mysqli($dbhost,$dbuser,$dbpswd,$dbname);
		if ($conn->connect_error)
		{
			die("Connection Failed: " . $conn->connect_error);
		}
	//Temp userID
	$userID = 1;
	
	//Get players information
		$result = $conn->query("SELECT * FROM players WHERE userID='$userID'");
		$result = mysqli_fetch_assoc($result);
		//Players variables
		$userName = $result['userName'];//UserName - Stored on players profile
		$techPoints = $result['techPoints'];//Players last saved tech points - Stored on players profile
		$techPointsIncrease = $result['techPointsIncrease'];//Players per tick tech point increase - stored on players profile
		$playerLastUpdate = $result['lastUpdate'];//Last time the players profile was edited - stored on players profile
		$cityFocusX = 2;//x coords of focused city, stored on players profile
		$cityFocusY = 0;//y coords of focused city, stored on players profile
		
		$techPoints = calcNewTechPoints($techPoints,$techPointsIncrease,$playerLastUpdate,$userID);
		
	//Get players current city information
		$cityInformation = getCityInformation($cityFocusX,$cityFocusY);

	?>
	<head>
		<link rel="stylesheet" href="styles/style.css"/>
	</head>
	<body>
	<!-- Main page container -->
		<div id='container'>
	<!-- Top header, news feed etc can go here -->
			<div id='header'>
				This is the header
			</div>
	<!-- Container for the main game areas -->
			<div id='gameContainer'>
	<!-- Resource display area (Across the top below the header) -->
				<div id='sectionResourceDisplay'>
					<div id='sectionResourceDisplayLeft'>
					</div>
					<div id='sectionResourceDisplayRight'>
					</div>
					<div id='sectionResourceDisplayCenter'>
					</div>
				</div>
	<!-- Left menu -->
				<div id='menuLeft'>
	<!-- Research button -->
					<div id='researchButtonDiv'>
						<img id='researchButton' src='media/images/buttons/buttonResearch.png' />
						<div id='researchPointsStr'>
						</div>
					</div>
				</div>
	<!-- Right menu -->
				<div id='menuRight'>
				</div>
	<!-- Canvas div -->
				<div id='canvasDiv' style='overFlow: hidden'>
				</div>
				<div id='chatWindow'>
				</div>
			</div>
		</div>
	</body>
</html>