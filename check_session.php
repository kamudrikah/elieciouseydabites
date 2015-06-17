<?php

if(!isset($_SESSION['login'])){ //if login in session is not set
    header("Location: http://elieciouseydabites.com/popup/popup_please_login.php");
}
?>