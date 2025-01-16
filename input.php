<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Atlet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #343a40;
            color: white;
        }
        .container {
            padding-bottom: 50px;
        }
        .btn-primary {
            margin-bottom: 20px;
        }
        .alert {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Input Data Atlet</h1>

        <!-- Error message -->
        <div id="error-message" class="alert alert-danger mb-4" role="alert">
            Input tidak valid. Harap periksa kembali nilai yang dimasukkan.
        </div>

        <form id="athleteForm" action="process_input.php" method="POST" class="needs-validation" novalidate>
            <div class="mb-3">
                <label for="name" class="form-label">Nama Atlet:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="strength_hand" class="form-label">Kekuatan Lengan (Hand Dynamometer): (1-100)</label>
                <select class="form-control" id="strength_hand" name="strength_hand" required>
                    <option value="">Pilih Nilai</option>
                    <?php for ($i = 1; $i <= 100; $i++) {
                        echo "<option value='$i'>$i</option>";
                    } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="strength_leg" class="form-label">Kekuatan Tungkai (Leg Dynamometer): (100-300)</label>
                <select class="form-control" id="strength_leg" name="strength_leg" required>
                    <option value="">Pilih Nilai</option>
                    <?php for ($i = 100; $i <= 300; $i++) {
                        echo "<option value='$i'>$i</option>";
                    } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="endurance_abs" class="form-label">Daya Tahan Perut (Sit Up): (1-100)</label>
                <select class="form-control" id="endurance_abs" name="endurance_abs" required>
                    <option value="">Pilih Nilai</option>
                    <?php for ($i = 1; $i <= 100; $i++) {
                        echo "<option value='$i'>$i</option>";
                    } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="endurance_arm" class="form-label">Daya Tahan Lengan (Push Up): (1-100)</label>
                <select class="form-control" id="endurance_arm" name="endurance_arm" required>
                    <option value="">Pilih Nilai</option>
                    <?php for ($i = 1; $i <= 100; $i++) {
                        echo "<option value='$i'>$i</option>";
                    } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="endurance_leg" class="form-label">Daya Tahan Tungkai (Squat Jump): (1-100)</label>
                <select class="form-control" id="endurance_leg" name="endurance_leg" required>
                    <option value="">Pilih Nilai</option>
                    <?php for ($i = 1; $i <= 100; $i++) {
                        echo "<option value='$i'>$i</option>";
                    } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="power_leg" class="form-label">Power Tungkai (Vertical Jump): (1-100)</label>
                <select class="form-control" id="power_leg" name="power_leg" required>
                    <option value="">Pilih Nilai</option>
                    <?php for ($i = 1; $i <= 100; $i++) {
                        echo "<option value='$i'>$i</option>";
                    } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="power_arm" class="form-label">Power Lengan (Medicine Ball): (1.00 - 10.00 detik)</label>
                <select class="form-control" id="power_arm" name="power_arm" required>
                    <option value="">Pilih Nilai</option>
                    <?php for ($i = 1; $i <= 10; $i++) {
                        echo "<option value='" . number_format($i, 2) . "'>" . number_format($i, 2);
                    } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="flexibility" class="form-label">Fleksibilitas (Flexometer): (1-30)</label>
                <select class="form-control" id="flexibility" name="flexibility" required>
                    <option value="">Pilih Nilai</option>
                    <?php for ($i = 1; $i <= 30; $i++) {
                        echo "<option value='$i'>$i</option>";
                    } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="agility" class="form-label">Kelincahan (Shuttle Run): (1.00 - 60.00 detik)</label>
                <select class="form-control" id="agility" name="agility" required>
                    <option value="">Pilih Nilai</option>
                    <?php for ($i = 1; $i <= 60; $i++) {
                        echo "<option value='" . number_format($i, 2) . "'>" . number_format($i, 2);
                    } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="vo2max" class="form-label">VO2max (Lari 15 Menit): (1-60)</label>
                <select class="form-control" id="vo2max" name="vo2max" required>
                    <option value="">Pilih Nilai</option>
                    <?php for ($i = 1; $i <= 60; $i++) {
                        echo "<option value='$i'>$i</option>";
                    } ?>
                </select>
            </div>
            <button type="submit" class="btn btn-warning w-100">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function validateForm() {
            let valid = true;
            const errorMessage = document.getElementById('error-message');
            const form = document.getElementById('athleteForm');

            // Clear previous error messages
            errorMessage.style.display = "none";

            // Validate input values against rules
            const inputs = form.querySelectorAll('select');
            for (let i = 0; i < inputs.length; i++) {
                const input = inputs[i];
                if (input.value === "") {
                    valid = false;
                    break;
                }
            }

            if (!valid) {
                errorMessage.style.display = "block";
                return false;
            }

            return true;
        }

        // Add the validation to form submission
        document.getElementById('athleteForm').onsubmit = validateForm;
    </script>
</body>
</html>
