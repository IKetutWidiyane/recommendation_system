<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komponen Terlemah Atlet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #343a40;
            color: white;
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
        .btn-back {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Komponen Terlemah Atlet</h1>

        <?php
        // Mengambil data atlet dari database
        $sql = "SELECT * FROM athletes";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='card'>";
                echo "<div class='card-header'>Atlet: " . htmlspecialchars($row['name']) . "</div>";
                echo "<div class='card-body'>";

                echo "<table class='table table-bordered'>";
                echo "<thead><tr><th>Komponen</th><th>Kategori</th><th>Metode Pengukuran</th></tr></thead>";
                echo "<tbody>";

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

                $weakest_components = [];
                $lowest_category_rank = PHP_INT_MAX;

                // Mengurutkan kategori untuk menentukan komponen terlemah
                $category_rank = [
                    'Kurang' => 1,
                    'Cukup' => 2,
                    'Baik' => 3,
                    'Baik Sekali' => 4,
                    'Sempurna' => 5
                ];

                foreach ($components as $component_name => $value) {
                    $category_sql = "SELECT categories.category, categories.measurement_method 
                                     FROM categories
                                     WHERE categories.component = '$component_name'
                                     AND $value BETWEEN categories.min_value AND categories.max_value";

                    $category_result = $conn->query($category_sql);
                    if ($category_result && $category_result->num_rows > 0) {
                        $category_row = $category_result->fetch_assoc();

                        echo "<tr>";
                        echo "<td>$component_name</td>";
                        echo "<td>" . htmlspecialchars($category_row['category']) . "</td>";
                        echo "<td>" . htmlspecialchars($category_row['measurement_method']) . "</td>";
                        echo "</tr>";

                        // Menentukan komponen terlemah berdasarkan ranking kategori
                        $current_category_rank = $category_rank[$category_row['category']];
                        if ($current_category_rank < $lowest_category_rank) {
                            $lowest_category_rank = $current_category_rank;
                            $weakest_components = [$component_name => $category_row['category']];
                        } elseif ($current_category_rank === $lowest_category_rank) {
                            $weakest_components[$component_name] = $category_row['category'];
                        }
                    } else {
                        // Jika data tidak ditemukan
                        echo "<tr>";
                        echo "<td>$component_name</td>";
                        echo "<td colspan='2'>Kategori tidak tersedia untuk nilai: $value</td>";
                        echo "</tr>";
                    }
                }

                echo "</tbody></table>";

                // Menampilkan komponen terlemah
                echo "<h5>Komponen Terlemah:</h5>";
                if (!empty($weakest_components)) {
                    foreach ($weakest_components as $component_name => $category) {
                        echo "<p>$component_name - $category</p>";
                    }
                } else {
                    echo "<p>Tidak ada data untuk menentukan komponen terlemah.</p>";
                }

                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<p class='text-center'>Belum ada data atlet atau data tidak sesuai.</p>";
        }

        $conn->close();
        ?>

        <a href="input.php" class="btn btn-primary btn-back w-100">Kembali ke Halaman Utama</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
