<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Results</title>
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
            width: 450px;
        }
        h2 {
            color: #333;
        }
        canvas {
            margin-top: 20px;
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
        <h2>Voting Results</h2>
        <canvas id="voteChart"></canvas>
        <a href="/vote" class="back-btn">Back to Voting</a>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var ctx = document.getElementById('voteChart').getContext('2d');
            var voteChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: {!! json_encode($votes->keys()) !!},  <!-- Changed to $votes -->
                    datasets: [{
                        data: {!! json_encode($votes->values()) !!},  <!-- Changed to $votes -->
                        backgroundColor: ['red', 'orange', 'yellow', 'green', 'blue'],
                        borderWidth: 1
                    }]
                },
                options: {
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function (tooltipItem) {
                                    return tooltipItem.label + ': ' + tooltipItem.raw + ' votes';  <!-- Display votes -->
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>
