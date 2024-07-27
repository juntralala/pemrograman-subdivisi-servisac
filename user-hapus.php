<?php
$conn = mysqli_connect('localhost', 'root', '', 'servisac');

$id_user = $_GET['id'];

$hapus = mysqli_query($conn, "DELETE FROM tbl_user WHERE id_user = $id_user");

if($hapus) header("Location: user.php");

