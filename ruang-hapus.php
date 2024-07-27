<?php
$conn = mysqli_connect('localhost', 'root', '', 'servisac');

$id_ruang = $_GET['id'];

$hapus = mysqli_query($conn, "DELETE FROM tbl_ruang WHERE id_ruang = $id_ruang");

if($hapus) header("Location: ruang.php");

