<?php
include 'db.php';

// Menangkap data dari form
$name = $_POST['name'];
$strength_hand = $_POST['strength_hand'];
$strength_leg = $_POST['strength_leg'];
$endurance_abs = $_POST['endurance_abs'];
$endurance_arm = $_POST['endurance_arm'];
$endurance_leg = $_POST['endurance_leg'];
$power_leg = $_POST['power_leg'];
$power_arm = $_POST['power_arm'];
$flexibility = $_POST['flexibility'];
$agility = $_POST['agility'];
$vo2max = $_POST['vo2max'];

// Menyusun query SQL untuk memasukkan data ke dalam tabel athletes
$sql = "INSERT INTO athletes (name, strength_hand, strength_leg, endurance_abs, endurance_arm, endurance_leg, power_leg, power_arm, flexibility, agility, vo2max) 
        VALUES ('$name', $strength_hand, $strength_leg, $endurance_abs, $endurance_arm, $endurance_leg, $power_leg, $power_arm, $flexibility, $agility, $vo2max)";

// Menjalankan query untuk menyimpan data
if ($conn->query($sql) === TRUE) {
    echo "Data atlet berhasil disimpan!";
    // Menambahkan tombol navigasi ke halaman rekomendasi
    echo '<br><br><a href="recommendations.php"><button>Ke Halaman Rekomendasi Latihan</button></a>';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi database
$conn->close();
?>
