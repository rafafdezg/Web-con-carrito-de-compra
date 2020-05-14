<?php 
session_start (); 
// Destruye sesiones 
unset($_SESSION['USER']);
unset($_SESSION['ROL']);
header('Location: ../index.php');
?>