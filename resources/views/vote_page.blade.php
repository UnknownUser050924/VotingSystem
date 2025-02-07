<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }
        h2 {
            margin-bottom: 10px;
            color: #333;
        }
        .subject-label {
            font-size: 16px;
            font-weight: bold;
        }
        select, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #28a745;
            color: white;
            font-weight: bold;
            cursor: pointer;
            border: none;
        }
        button:hover {
            background-color: #218838;
        }
        .message {
            margin-top: 10px;
            font-weight: bold;
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Vote for Your Favorite Fruit</h2>
        
        <!-- Flash Message -->
        @if(session('success'))
            <p class="message">{{ session('success') }}</p>
        @endif

        <!-- Voting Form -->
        <form action="{{ route('vote.store') }}" method="POST">
            @csrf
            <label class="subject-label">Choose a Fruit:</label>
            <select name="subject" required>
                <option value="apple">Apple</option>
                <option value="orange">Orange</option>
                <option value="pineapple">Pineapple</option>
                <option value="watermelon">Watermelon</option>
                <option value="mango">Mango</option>
            </select>

            <label class="subject-label">Rate (1-5):</label>
            <select name="rating" required>
                <option value="1">1 - Poor</option>
                <option value="2">2 - Fair</option>
                <option value="3">3 - Good</option>
                <option value="4">4 - Very Good</option>
                <option value="5">5 - Excellent</option>
            </select>

            <button type="submit">Submit Vote</button>
        </form>
    </div>
</body>
</html>
