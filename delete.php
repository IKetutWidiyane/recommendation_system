<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

  
    $sql = "DELETE FROM athletes WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Data atlet berhasil dihapus!";
        header("Location: recommendations.php");
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "ID tidak ditemukan.";
}

$conn->close();
?>
