<?php function clean($data) {
	global $conn;
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = htmlentities($data);
 $data = mysqli_real_escape_string($conn,$data);
  return $data;
}

function promotion($score){
		$scores = (int)($score/10);
	switch ($scores) {
		case 10:
		case 9:
		case 8:
		case 7:
		case 6:
		case 5:
		case 4:
		
			$promotion= "PROMOTED";

			break;
		
		default:
			$promotion="NOT PROMOTED";
			
	}
	return $promotion;
}
function grade($score){
		$scores = (int)($score/10);
	switch ($scores) {
		case 10:
		case 9:
		case 8:
		case 7:
			$grade= "A";

			break;
		case 6:
			$grade= "B";
			break;
		case 5:
			$grade="C";
			break;
		case 4: 
			$grade= "D";
			break;
			case 0: 
			$grade= "-";
			break;
		default:
			$grade="F";
			
	}
	return $grade;
}
function points($score){
		$scores = (int)($score/10);
	switch ($scores) {
		case 10:
		case 9:
		case 8:
		case 7:
			$points= 5;

			break;
		case 6:
			$points= 4;
			break;
		case 5:
			$points= 3;
			break;
		case 4: 
			$points= 2;
			break;
			case 3: 
			case 2: 
			case 1: 
			case 0: 
			$points = 0;
			break;
		default:
			$points= "-";
			break;
			
	}
	return $points;
}

function gp($a,$b){
	return $a*$b;
}
function cgp($a,$b){
	return $a/$b;
}
?>