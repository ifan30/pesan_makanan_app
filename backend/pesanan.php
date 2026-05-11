<?php
include 'koneksi.php';

function simpanPesanan($nama, $alamat, $hp, $cart) {
    global $conn;

    // Simpan ke tabel pesanan
    $conn->query("INSERT INTO pesanan (nama, alamat, hp) 
    VALUES ('$nama','$alamat','$hp')");

    $id_pesanan = $conn->insert_id;

    // Simpan detail pesanan
    foreach ($cart as $id_produk) {
        $conn->query("INSERT INTO detail_pesanan (id_pesanan, id_produk, qty) 
        VALUES ($id_pesanan, $id_produk, 1)");
    }
}
?>