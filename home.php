<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Google Fonts (Roboto) -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #343a40; /* Dark background */
            color: #fff; /* White text for contrast */
        }
        .heading {
            font-size: 2.5rem;
            font-weight: 700;
            text-align: center;
            margin-bottom: 50px;
            color: #f1f1f1;
        }
        .card {
            border-radius: 10px;
            background-color: #495057; /* Slightly lighter dark color for card */
            margin: 20px 0;
        }
        .card-header {
            background-color: #6c757d;
            color: #fff;
        }
        .card-body {
            background-color: #6c757d;
        }
        .card-title {
            font-size: 1.5rem;
            color: #f1f1f1;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center align-items-center" style="height: 100vh;">
            <div class="col-md-6">
                <div class="text-center mb-4">
                    <h1 class="heading">Welcome to the Karate Training System</h1>
                </div>

                <!-- Card 1: Navigate to input.php -->
                <div class="card shadow-lg">
                    <div class="card-header text-center">
                        <h4 class="card-title">Input User Data</h4>
                    </div>
                    <div class="card-body text-center">
                        <p>Enter your details to proceed with the system.</p>
                        <a href="input.php" class="btn btn-primary btn-block">Go to Input</a>
                    </div>
                </div>

                <!-- Card 2: Navigate to recommendations.php -->
                <div class="card shadow-lg">
                    <div class="card-header text-center">
                        <h4 class="card-title">View Recommendations</h4>
                    </div>
                    <div class="card-body text-center">
                        <p>Get your personalized training recommendations.</p>
                        <a href="recommendations.php" class="btn btn-primary btn-block">Go to Recommendations</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
