<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM athletes WHERE id = $id";
    $result = $conn->query($sql);
    $athlete = $result->fetch_assoc();
} else {
    header("Location: hasil.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    $update_sql = "UPDATE athletes SET 
                    name='$name', 
                    strength_hand=$strength_hand, 
                    strength_leg=$strength_leg, 
                    endurance_abs=$endurance_abs, 
                    endurance_arm=$endurance_arm, 
                    endurance_leg=$endurance_leg, 
                    power_leg=$power_leg, 
                    power_arm=$power_arm, 
                    flexibility=$flexibility, 
                    agility=$agility, 
                    vo2max=$vo2max
                    WHERE id=$id";

    if ($conn->query($update_sql) === TRUE) {
        echo "Data berhasil diperbarui!";
        header("Location: hasil.php");
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Atlet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #343a40; /* Dark background */
            color: #fff; /* White text for contrast */
        }
        .card {
            border-radius: 10px;
            background-color: #495057; /* Slightly lighter dark color for card */
            padding: 20px;
        }
        .card-header {
            background-color: #6c757d;
            color: #fff;
        }
        .form-control {
            background-color: #495057;
            color: #fff;
            border-color: #6c757d;
            padding: 10px;
        }
        .form-control:focus {
            border-color: #007bff;
            background-color: #495057;
            color: #fff;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .form-group {
            margin-left: 5px;
            margin-right: 5px;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Data Atlet</h1>
        <form action="edit.php?id=<?php echo $athlete['id']; ?>" method="POST">
            <div class="mb-3 form-group">
                <label for="name" class="form-label">Nama Atlet</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $athlete['name']; ?>" required>
            </div>

            <div class="mb-3 form-group">
                <label for="strength_hand" class="form-label">Kekuatan Lengan (Hand Dynamometer)</label>
                <input type="number" class="form-control" id="strength_hand" name="strength_hand" value="<?php echo $athlete['strength_hand']; ?>" required>
            </div>

            <div class="mb-3 form-group">
                <label for="strength_leg" class="form-label">Kekuatan Tungkai (Leg Dynamometer)</label>
                <input type="number" class="form-control" id="strength_leg" name="strength_leg" value="<?php echo $athlete['strength_leg']; ?>" required>
            </div>

            <div class="mb-3 form-group">
                <label for="endurance_abs" class="form-label">Daya Tahan Perut (Sit Up)</label>
                <input type="number" class="form-control" id="endurance_abs" name="endurance_abs" value="<?php echo $athlete['endurance_abs']; ?>" required>
            </div>

            <div class="mb-3 form-group">
                <label for="endurance_arm" class="form-label">Daya Tahan Lengan (Push Up)</label>
                <input type="number" class="form-control" id="endurance_arm" name="endurance_arm" value="<?php echo $athlete['endurance_arm']; ?>" required>
            </div>

            <div class="mb-3 form-group">
                <label for="endurance_leg" class="form-label">Daya Tahan Tungkai (Squat Jump)</label>
                <input type="number" class="form-control" id="endurance_leg" name="endurance_leg" value="<?php echo $athlete['endurance_leg']; ?>" required>
            </div>

            <div class="mb-3 form-group">
                <label for="power_leg" class="form-label">Power Tungkai (Vertical Jump)</label>
                <input type="number" class="form-control" id="power_leg" name="power_leg" value="<?php echo $athlete['power_leg']; ?>" required>
            </div>

            <div class="mb-3 form-group">
                <label for="power_arm" class="form-label">Power Lengan (Medicine Ball)</label>
                <input type="number" class="form-control" id="power_arm" name="power_arm" value="<?php echo $athlete['power_arm']; ?>" required>
            </div>

            <div class="mb-3 form-group">
                <label for="flexibility" class="form-label">Fleksibilitas (Flexometer)</label>
                <input type="number" class="form-control" id="flexibility" name="flexibility" value="<?php echo $athlete['flexibility']; ?>" required>
            </div>

            <div class="mb-3 form-group">
                <label for="agility" class="form-label">Kelincahan (Shuttle Run)</label>
                <input type="number" class="form-control" id="agility" name="agility" value="<?php echo $athlete['agility']; ?>" required>
            </div>

            <div class="mb-3 form-group">
                <label for="vo2max" class="form-label">VO2max (Lari 15 Menit)</label>
                <input type="number" class="form-control" id="vo2max" name="vo2max" value="<?php echo $athlete['vo2max']; ?>" required>
            </div>

            <button type="submit" class="btn btn-warning w-100">Update Data</button>
        </form>
    </div>

</body>
</html>
