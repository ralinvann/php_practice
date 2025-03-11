<?php
    function isPrime($number) {
        if ($number < 2) {
            return false;
        }
        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i == 0) {
                return false;
            }
        }
        return true;
    }

    function generatePrimes($limit) {
        $primes = [];
        $number = 2;
        while (count($primes) < $limit) {
            if (isPrime($number)) {
                $primes[] = $number;
            }
            $number++;
        }
        return $primes;
    }

    function fibonacci($n) {
        if ($n == 0){
            return 0;
        } else if ($n == 1) {
            return 1;
        } else {
            return (fibonacci($n - 1) + fibonacci($n - 2));
        }
    }

    function displayFibonacci($n) {
        $sequence = [];
        for ($i = 0; $i < $n; $i++) {
            $sequence[] = fibonacci($i);
        }
        return $sequence;
    }

    $limit = $_POST['prime_limit'] ?? 10;
    $primeNumbers = generatePrimes($limit);

    $n = $_POST['fibonacci_limit'] ?? 10;
    $fibonacciSequence = displayFibonacci($n);

    $scores = isset($_POST['scores']) ? explode(',', $_POST['scores']) : [85, 90, 78, 92, 88];
    $average = array_sum($scores) / count($scores);

    $maxScore = max($scores);

    $array1 = isset($_POST['array1']) ? explode(',', $_POST['array1']) : [1, 2, 3, 4, 5];
    $array2 = isset($_POST['array2']) ? explode(',', $_POST['array2']) : [6, 7, 8, 9, 10];

    $mergedArray = array_merge($array1, $array2);
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
                <h1 class="card-title text-center">PHP Input-Based Program</h1>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="prime_limit">Prime Numbers Limit:</label>
                        <input type="number" class="form-control" id="prime_limit" name="prime_limit" placeholder="Enter limit for prime numbers" value="<?php echo htmlspecialchars($limit); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="fibonacci_limit">Fibonacci Sequence Limit:</label>
                        <input type="number" class="form-control" id="fibonacci_limit" name="fibonacci_limit" placeholder="Enter limit for Fibonacci sequence" value="<?php echo htmlspecialchars($n); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="scores">Scores (comma-separated):</label>
                        <input type="text" class="form-control" id="scores" name="scores" placeholder="Enter scores separated by commas" value="<?php echo htmlspecialchars(implode(',', $scores)); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="array1">Array 1 (comma-separated):</label>
                        <input type="text" class="form-control" id="array1" name="array1" placeholder="Enter first array separated by commas" value="<?php echo htmlspecialchars(implode(',', $array1)); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="array2">Array 2 (comma-separated):</label>
                        <input type="text" class="form-control" id="array2" name="array2" placeholder="Enter second array separated by commas" value="<?php echo htmlspecialchars(implode(',', $array2)); ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
                    <p class="mt-3">The first <?php echo htmlspecialchars($limit); ?> prime numbers are <?php echo htmlspecialchars(implode(", ", $primeNumbers)); ?>.</p>
                    <p class="mt-3">The first <?php echo htmlspecialchars($n); ?> numbers in the Fibonacci sequence are <?php echo htmlspecialchars(implode(", ", $fibonacciSequence)); ?>.</p>
                    <p class="mt-3">The average score is <?php echo htmlspecialchars($average); ?>.</p>
                    <p class="mt-3">The highest score is <?php echo htmlspecialchars($maxScore); ?>.</p>
                    <p class="mt-3">The merged array is <?php echo htmlspecialchars(implode(", ", $mergedArray)); ?>.</p>
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