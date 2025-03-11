<?php
    $firstNumber = $_POST['first_number'] ?? 0;
    $secondNumber = $_POST['second_number'] ?? 0;
    $operation = $_POST['operation'] ?? "addition";
    $result = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['calc_submit'])) {
        switch($operation) {
            case "addition":
                $result = $firstNumber + $secondNumber;
                break;
            case "subtraction":
                $result = $firstNumber - $secondNumber;
                break;
            case "multiplication":
                $result = $firstNumber * $secondNumber;
                break;
            case "division":
                $result = $secondNumber != 0 ? $firstNumber / $secondNumber : "Error: Division by zero";
                break;
            default:
                $result = 0;
        }
    }

    $amount = $_POST['amount'] ?? 0;
    $currency = $_POST['currency'] ?? "USD";
    $convertedAmount = 0;
    $exchangeRates = [
        "USD" => 1,
        "EUR" => 0.85,
        "GBP" => 0.75,
        "JPY" => 110
    ];

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['convert_submit'])) {
        $convertedAmount = $amount * $exchangeRates[$currency];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title text-center">PHP Calculator</h1>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="first_number">First Number:</label>
                        <input type="number" class="form-control" id="first_number" name="first_number" placeholder="Write down a number!" value="<?php echo htmlspecialchars($firstNumber); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="second_number">Second Number:</label>
                        <input type="number" class="form-control" id="second_number" name="second_number" placeholder="Write down a number!" value="<?php echo htmlspecialchars($secondNumber); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="operation">Operation:</label>
                        <select class="form-control" id="operation" name="operation" required>
                            <option value="addition" <?php echo $operation == "addition" ? "selected" : ""; ?>>+</option>
                            <option value="subtraction" <?php echo $operation == "subtraction" ? "selected" : ""; ?>>-</option>
                            <option value="multiplication" <?php echo $operation == "multiplication" ? "selected" : ""; ?>>×</option>
                            <option value="division" <?php echo $operation == "division" ? "selected" : ""; ?>>÷</option>
                        </select>
                    </div>
                    <button type="submit" name="calc_submit" class="btn btn-primary btn-block">Submit</button>
                </form>
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['calc_submit'])): ?>
                    <p class="mt-3">The result of <?php echo htmlspecialchars($firstNumber); ?> <?php echo htmlspecialchars($operation); ?> <?php echo htmlspecialchars($secondNumber); ?> is <?php echo htmlspecialchars($result); ?>.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-body">
                <h1 class="card-title text-center">Currency Converter</h1>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="amount">Amount:</label>
                        <input type="number" step="any" class="form-control" id="amount" name="amount" placeholder="Enter amount" value="<?php echo htmlspecialchars($amount); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="currency">Currency:</label>
                        <select class="form-control" id="currency" name="currency" required>
                            <option value="USD" <?php echo $currency == "USD" ? "selected" : ""; ?>>USD</option>
                            <option value="EUR" <?php echo $currency == "EUR" ? "selected" : ""; ?>>EUR</option>
                            <option value="GBP" <?php echo $currency == "GBP" ? "selected" : ""; ?>>GBP</option>
                            <option value="JPY" <?php echo $currency == "JPY" ? "selected" : ""; ?>>JPY</option>
                        </select>
                    </div>
                    <button type="submit" name="convert_submit" class="btn btn-primary btn-block">Convert</button>
                </form>
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['convert_submit'])): ?>
                    <p class="mt-3">The converted amount is <?php echo htmlspecialchars($convertedAmount); ?> <?php echo htmlspecialchars($currency); ?>.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>