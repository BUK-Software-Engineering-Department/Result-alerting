



<?php 
	function excape($string) {	
		echo isset($_POST[$string]) ? htmlentities($_POST[$string],  ENT_QUOTES, 'UTF-8') : "";
	}
	function escape($string) {	
		return htmlentities($string, ENT_QUOTES, 'UTF-8');
	}
?>