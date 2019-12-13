<?php
//starting a session

session_start();

                  
                    
//if cookie found
if(isset($_COOKIE['logincookie'])){
//$_SESSION['logincheck'] = $_COOKIE['logincookie'];
}

//check for session

if(!isset($_SESSION['logincheck'])) {
	header("location: login.php");
	
}




?>