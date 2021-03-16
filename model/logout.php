<?php

session_start();
unset($_SESSION['user'],  $_SESSION['nome']);
header("Location: ../view/index.php");


?>