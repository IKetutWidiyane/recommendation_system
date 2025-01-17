<?php
include 'db.php';

$sql = "SELECT * FROM athletes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Athletes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #343a40;
            color: white;
        }
        .container {
            padding-bottom: 50px;
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
        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        .btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0a58ca;
        }
        .btn-edit {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #000;
        }
        .btn-edit:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }
        .btn-delete {
            background-color: #dc3545;
            border-color: #dc3545;
            color: #fff;
        }
        .btn-delete:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .text-center {
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Data Pengukuran</h1>
        <div class="d-flex justify-content-between mb-3">
            <a href="recommendations.php" class="btn btn-success">Rekomendasi Latihan</a>
        </div>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Strength Hand</th>
                    <th>Strength Leg</th>
                    <th>Endurance Abs</th>
                    <th>Endurance Arm</th>
                    <th>Endurance Leg</th>
                    <th>Power Leg</th>
                    <th>Power Arm</th>
                    <th>Flexibility</th>
                    <th>Agility</th>
                    <th>VO2Max</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['strength_hand'] . "</td>";
                        echo "<td>" . $row['strength_leg'] . "</td>";
                        echo "<td>" . $row['endurance_abs'] . "</td>";
                        echo "<td>" . $row['endurance_arm'] . "</td>";
                        echo "<td>" . $row['endurance_leg'] . "</td>";
                        echo "<td>" . $row['power_leg'] . "</td>";
                        echo "<td>" . $row['power_arm'] . "</td>";
                        echo "<td>" . $row['flexibility'] . "</td>";
                        echo "<td>" . $row['agility'] . "</td>";
                        echo "<td>" . $row['vo2max'] . "</td>";
                        echo "<td>";
                        echo "<a href='edit.php?id=" . $row['id'] . "' class='btn btn-edit btn-sm' title='Edit'>";
                        echo "<i class='bi bi-pencil-square'></i>";
                        echo "</a> ";
                        echo "<a href='delete.php?id=" . $row['id'] . "' class='btn btn-delete btn-sm' title='Delete' onclick='return confirm(\"Are you sure you want to delete this record?\")'>";
                        echo "<i class='bi bi-trash'></i>";
                        echo "</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='13' class='text-center'>No data found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>

<?php
$conn->close();
?>
