<?php
$conn = mysqli_connect('localhost', 'root', '', 'servisac');

$id_jenis = $_GET['id'];

$hapus = mysqli_query($conn, "DELETE FROM tbl_jenis WHERE id_jenis = $id_jenis");

if($hapus) header("Location: jenis.php");

