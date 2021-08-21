<?php 
session_start();
if (!isset($_SESSION['id']) && !isset($_SESSION['nombre'])) {
    header("location: ../login");
}
?>