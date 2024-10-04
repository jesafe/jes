<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }
        .calculator {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input[type="number"], select, input[type="submit"] {
            margin: 5px;
            padding: 10px;
            font-size: 1rem;
        }
        h1 {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
        .result {
            margin-top: 20px;
            font-size: 1.25rem;
        }
    </style>
</head>
<body>
    <div class="calculator">
        <h1>Simple PHP Calculator</h1>
        <form method="post" action="">
            <input type="number" name="num1" placeholder="First number" required>
            <select name="operation" required>
                <option value="add">+</option>
                <option value="subtract">-</option>
                <option value="multiply">*</option>
                <option value="divide">/</option>
            </select>
            <input type="number" name="num2" placeholder="Second number" required>
            <input type="submit" value="Calculate">
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve and sanitize input
            $num1 = filter_input(INPUT_POST, 'num1', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $num2 = filter_input(INPUT_POST, 'num2', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $operation = filter_input(INPUT_POST, 'operation', FILTER_SANITIZE_STRING);

            // Initialize result
            $result = null;

            // Perform calculation based on selected operation
            switch ($operation) {
                case 'add':
                    $result = $num1 + $num2;
                    break;
                case 'subtract':
                    $result = $num1 - $num2;
                    break;
                case 'multiply':
                    $result = $num1 * $num2;
                    break;
                case 'divide':
                    if ($num2 != 0) {
                        $result = $num1 / $num2;
                    } else {
                        $result = 'Error: Division by zero';
                    }
                    break;
                default:
                    $result = 'Invalid operation';
                    break;
            }

            // Display result
            echo "<div class='result'><strong>Result:</strong> $result</div>";
        }
        ?>
    </div>
</body>
</html>
