<?php

session_start();
unset($_SESSION['logincheck']);
session_destroy();
setcookie("logincookie",null,time()-123);


if(isset($_SERVER['HTTP_REFERER'])) {
 header('Location: '.$_SERVER['HTTP_REFERER']);  
} else {
 header('Location: index.php');  
}
exit;  
?>



<?php
//header("Refresh:3; url=login.php");


?>