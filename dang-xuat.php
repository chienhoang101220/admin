<?php 
include 'connect.php';

// Cach1: xóa session theo tên: unset($_SESSION['user']);
//cách 2: xóa tất cả các session có trên web.
session_destroy();
header('location: index.php');
 ?>
