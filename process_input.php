<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Atlet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow border-0">
            <div class="card-body">
                <?php
                include 'db.php';

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

                $sql = "INSERT INTO athletes (name, strength_hand, strength_leg, endurance_abs, endurance_arm, endurance_leg, power_leg, power_arm, flexibility, agility, vo2max) 
                        VALUES ('$name', $strength_hand, $strength_leg, $endurance_abs, $endurance_arm, $endurance_leg, $power_leg, $power_arm, $flexibility, $agility, $vo2max)";

                if ($conn->query($sql) === TRUE) {
                    echo "<div class='alert alert-success text-center'>Data atlet berhasil disimpan!</div>";
                } else {
                    echo "<div class='alert alert-danger text-center'>Error: " . $sql . "<br>" . $conn->error . "</div>";
                }

                $conn->close();
                ?>

                <div class="text-center mt-4">
                    <a href="hasil.php" class="btn btn-primary">Lihat Hasil Pengukuran</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
