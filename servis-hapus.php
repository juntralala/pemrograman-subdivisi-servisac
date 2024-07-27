<?php
$conn = mysqli_connect('localhost', 'root', '', 'servisac');

$id_servis = $_GET['id'];

$hapus = mysqli_query($conn, "DELETE FROM tbl_servis WHERE id_servis = $id_servis");

if($hapus) header("Location: servis.php");

