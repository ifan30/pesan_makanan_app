<?php

include '../backend/koneksi.php';

$id = $_GET['id'];

$conn->query("DELETE FROM pesanan WHERE id='$id'");

header("Location: index.php");

?>