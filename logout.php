
<?php
session_start();
require_once 'database/database.php';

//Detruire la session pour deconnecter le user
session_unset();
session_destroy();

header('location:index.php');
?>