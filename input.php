<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Atlet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #343a40; /* Warna latar belakang gelap */
            color: white; /* Warna font putih */
        }
        .container {
            padding-bottom: 50px; /* Menambahkan jarak di bawah container */
        }
        .btn-primary {
            margin-bottom: 20px; /* Menambahkan jarak pada tombol submit */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Input Data Atlet</h1>
        <form action="process_input.php" method="POST" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="name" class="form-label">Nama Atlet:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="strength_hand" class="form-label">Kekuatan Lengan (Hand Dynamometer):</label>
                <input type="number" class="form-control" id="strength_hand" name="strength_hand" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="strength_leg" class="form-label">Kekuatan Tungkai (Leg Dynamometer):</label>
                <input type="number" class="form-control" id="strength_leg" name="strength_leg" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="endurance_abs" class="form-label">Daya Tahan Perut (Sit Up):</label>
                <input type="number" class="form-control" id="endurance_abs" name="endurance_abs" required>
            </div>
            <div class="mb-3">
                <label for="endurance_arm" class="form-label">Daya Tahan Lengan (Push Up):</label>
                <input type="number" class="form-control" id="endurance_arm" name="endurance_arm" required>
            </div>
            <div class="mb-3">
                <label for="endurance_leg" class="form-label">Daya Tahan Tungkai (Squat Jump):</label>
                <input type="number" class="form-control" id="endurance_leg" name="endurance_leg" required>
            </div>
            <div class="mb-3">
                <label for="power_leg" class="form-label">Power Tungkai (Vertical Jump):</label>
                <input type="number" class="form-control" id="power_leg" name="power_leg" required>
            </div>
            <div class="mb-3">
                <label for="power_arm" class="form-label">Power Lengan (Medicine Ball):</label>
                <input type="number" class="form-control" id="power_arm" name="power_arm" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="flexibility" class="form-label">Fleksibilitas (Flexometer):</label>
                <input type="number" class="form-control" id="flexibility" name="flexibility"  required>
            </div>
            <div class="mb-3">
                <label for="agility" class="form-label">Kelincahan (Shuttle Run):</label>
                <input type="number" class="form-control" id="agility" name="agility" step="0.01" required>
            </div>
            <div class="mb-3">
                <label for="vo2max" class="form-label">VO2max (Lari 15 Menit):</label>
                <input type="number" class="form-control" id="vo2max" name="vo2max" required>
            </div>
            <button type="submit" class="btn btn-warning w-100">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
