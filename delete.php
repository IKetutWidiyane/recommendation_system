<?php
// Memanggil file koneksi
include 'db.php';

// Cek jika id ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data berdasarkan ID
    $sql = "DELETE FROM athletes WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Data berhasil dihapus!'); window.location.href = 'data_athletes.php';</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "ID tidak ditemukan.";
}

// Menutup koneksi
$conn->close();
?>
