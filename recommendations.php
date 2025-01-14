<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekomendasi Latihan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #343a40; /* Warna latar belakang gelap */
            color: white; /* Warna font putih */
        }
        .container {
            padding-bottom: 50px;
        }
        .card {
            margin-bottom: 20px;
            background-color: rgb(212, 212, 212);
            border: none;
        }
        .card-header {
            background-color: rgb(207, 207, 207);
            font-size: 1.25rem;
            font-weight: bold;
        }
        .card-body {
            background-color: rgb(221, 221, 221);
        }
        .btn-back {
            margin-top: 20px;
        }
        .btn-edit, .btn-delete {
            margin-top: 10px;
        }
        .table th, .table td {
            text-align: center;
             color: white;
        }
        .table th {
            background-color: #6c757d;
        }
        .table td {
            background-color: #495057;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Rekomendasi Latihan Atlet</h1>
        
        <?php
        // Mengambil data atlet
        $sql = "SELECT * FROM athletes";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='card'>";
                echo "<div class='card-header'>" . $row['name'] . "</div>";
                echo "<div class='card-body'>";

                echo "<table class='table table-bordered'>";
                echo "<thead><tr><th>Komponen</th><th>Kategori</th><th>Metode Pengukuran</th><th>Rekomendasi</th></tr></thead>";
                echo "<tbody>";

                // Menyusun array komponen yang dimiliki oleh atlet
                $components = [
                    'Kekuatan Lengan' => $row['strength_hand'],
                    'Kekuatan Tungkai' => $row['strength_leg'],
                    'Daya Tahan Perut' => $row['endurance_abs'],
                    'Daya Tahan Lengan' => $row['endurance_arm'],
                    'Daya Tahan Tungkai' => $row['endurance_leg'],
                    'Power Tungkai' => $row['power_leg'],
                    'Power Lengan' => $row['power_arm'],
                    'Fleksibilitas' => $row['flexibility'],
                    'Kelincahan' => $row['agility'],
                    'VO2max' => $row['vo2max']
                ];

                // Proses setiap komponen dan mendapatkan rekomendasi
                foreach ($components as $component => $value) {
                    // Query untuk mencari kategori, rekomendasi, dan measurement_method berdasarkan komponen dan nilai
                    $category_sql = "SELECT categories.category, recommendations.recommendation, categories.measurement_method 
                                     FROM categories
                                     INNER JOIN recommendations
                                     ON categories.category = recommendations.category
                                     WHERE categories.component = '$component'
                                     AND $value BETWEEN categories.min_value AND categories.max_value";

                    $category_result = $conn->query($category_sql);
                    if ($category_result->num_rows > 0) {
                        $category_row = $category_result->fetch_assoc();
                        // Menampilkan kategori, metode pengukuran, dan rekomendasi untuk komponen yang sesuai
                        echo "<tr>";
                        echo "<td><strong>$component</strong></td>";
                        echo "<td>" . $category_row['category'] . "</td>";
                        echo "<td>" . $category_row['measurement_method'] . "</td>";
                        echo "<td>" . $category_row['recommendation'] . "</td>";
                        echo "</tr>";
                    } else {
                        echo "<tr><td colspan='4'><strong>$component:</strong> Data tidak ditemukan untuk kategori yang sesuai.</td></tr>";
                    }
                }

                echo "</tbody></table>";

                // Menambahkan tombol Edit dan Delete untuk setiap atlet
                echo "<a href='edit.php?id=" . $row['id'] . "' class='btn btn-warning btn-edit'>Edit</a>";
                echo "<a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-delete' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Delete</a>";

                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p class='text-center'>Belum ada data atlet.</p>";
        }

        // Menutup koneksi database
        $conn->close();
        ?>

        <a href="input.php" class="btn btn-primary btn-back w-100">Kembali ke Halaman Utama</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
