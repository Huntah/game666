<?php 
	//Functions belonging to the player
	
	//Update new tech points on login
	function calcNewTechPoints($techPoints,$techPointsIncrease,$playerLastUpdate,$userID) {
		date_default_timezone_set('NZ');
		$dateCurrent = new DateTime();
		$dteLastUpdate = new DateTime($playerLastUpdate);
		$diffInSeconds = $dateCurrent->getTimestamp() - $dteLastUpdate->getTimestamp();//How many seconds between now and last update
		
		$ticks = floor($diffInSeconds/6);
		
		$techPoints = $techPoints + ($techPointsIncrease*$ticks);//Add research points to variable
		if($techPoints > 2200) {//Stop variable going over its max value
			$techPoints = 2200;
		}
		
		$dbhost = "119.252.191.145:3306";  
		$dbname = "ageOfNations";              
		$dbuser = "shawn";           		
		$dbpswd = "py9cbMLAQfy5zrPG"; 

		$conn = new mysqli($dbhost,$dbuser,$dbpswd,$dbname);
			if ($conn->connect_error)
			{
				die("Connection Failed: " . $conn->connect_error);
			}
		//Store the updated tech points and a new last edited date into the db	
		$result = $conn->query("UPDATE players SET techPoints='$techPoints' WHERE userID='$userID'");
		
		return $techPoints;
	}
	
	//Get city information upon login but doesn't update it yet
	function getCityInformation($coordX,$coordY) {
		$dbhost = "119.252.191.145:3306";  
		$dbname = "ageOfNations";              
		$dbuser = "shawn";           		
		$dbpswd = "py9cbMLAQfy5zrPG"; 

		$conn = new mysqli($dbhost,$dbuser,$dbpswd,$dbname);
			if ($conn->connect_error)
			{
				die("Connection Failed: " . $conn->connect_error);
			}
	
		$result = $conn->query("SELECT * FROM cities WHERE cityCoordX='$coordX' AND cityCoordY='$coordY'");
		$result = mysqli_fetch_assoc($result);
		$returnArray = array();
		array_push($returnArray,$result['cityID']);//ID of city
		array_push($returnArray,$result['cityName']);//Cities name
		array_push($returnArray,$result['cityContent']);//Content of city (Loyalty)
		array_push($returnArray,$result['cityContentTrend']);//Current trend of cities content
		array_push($returnArray,$result['cityResourceLumber']);//Lumber in city
		array_push($returnArray,$result['cityResourceFood']);//Food in city
		array_push($returnArray,$result['cityResourceIron']);//Iron in city
		array_push($returnArray,$result['cityResourceStone']);//Stone in city
		array_push($returnArray,$result['cityResourceGold']);//Gold in city
		array_push($returnArray,$result['cityLastUpdate']);//Last city update time
		array_push($returnArray,$result['cityPopulation']);//Population in city
		array_push($returnArray,$result['cityType']);//Type of city
		array_push($returnArray,$result['cityBuildTime']);//Remaining time of building being built
		array_push($returnArray,$result['cityBuildStr']);//String for building being built
		array_push($returnArray,$result['currentArea']);//Last viewed area in the city

		return $returnArray;
		
	}
?>