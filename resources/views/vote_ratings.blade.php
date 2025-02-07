<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Average Ratings</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 500px;
        }
        h2 {
            color: #333;
        }
        canvas {
            margin-top: 20px;
            width: 100% !important;
            height: 300px !important;
        }
        .back-btn {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .back-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Average Ratings of Fruits</h2>
        <canvas id="ratingChart"></canvas>
        <a href="/vote" class="back-btn">Back to Voting</a>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var ctx = document.getElementById('ratingChart').getContext('2d');
            var ratingChart = new Chart(ctx, {
                type: 'bar', // Changed to 'bar' for a bar chart
                data: {
                    labels: {!! json_encode($ratings->keys()) !!}, // Use the keys (subject names)
                    datasets: [{
                        label: 'Average Rating', // Added a label for the bar chart
                        data: {!! json_encode($ratings->values()) !!}, // Use the values (ratings)
                        backgroundColor: ['red', 'orange', 'yellow', 'green', 'blue'], // Assign colors
                        borderColor: ['darkred', 'darkorange', 'darkyellow', 'darkgreen', 'darkblue'], // Optional border color
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function (tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw.toFixed(1) + ' / 5'; // Display rounded rating
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true, // Start the y-axis at 0 for better visibility
                            max: 5, // Maximum value set to 5 (since ratings are out of 5)
                            title: {
                                display: true,
                                text: 'Rating'
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>
