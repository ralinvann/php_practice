<?php
    $radius = isset($_POST['radius']) ? $_POST['radius'] : 5;
    $area = pi() * pow($radius, 2);

    $celsius = isset($_POST['celsius']) ? $_POST['celsius'] : 30;
    $fahrenheit = $celsius * 1.8 + 32;

    $number = isset($_POST['number']) ? $_POST['number'] : 6;
    $parity = $number % 2 == 0 ? "even" : "odd";

    $item = isset($_POST['item']) ? $_POST['item'] : 1000;
    $discount = isset($_POST['discount']) ? $_POST['discount'] : 20;
    $discounted_item = $item - ($item * $discount / 100);
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
                <h1 class="card-title text-center">PHP Calculations</h1>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="radius">Radius:</label>
                        <input type="number" step="any" class="form-control" id="radius" name="radius" value="<?php echo $radius; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="celsius">Celsius:</label>
                        <input type="number" step="any" class="form-control" id="celsius" name="celsius" value="<?php echo $celsius; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="number">Number:</label>
                        <input type="number" class="form-control" id="number" name="number" value="<?php echo $number; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="item">Item:</label>
                        <input type="number" class="form-control" id="item" name="item" value="<?php echo $item; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="discount">Discount:</label>
                        <input type="number" class="form-control" id="discount" name="discount" value="<?php echo $discount; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                </form>
                <p class="mt-3">The area of the circle with radius <?php echo $radius; ?> is <?php echo $area; ?>.</p>
                <p><?php echo $celsius; ?>°C is equal to <?php echo $fahrenheit; ?>°F.</p>
                <p>The number <?php echo $number; ?> is <?php echo $parity; ?>.</p>
                <p>The price of <?php echo $item; ?> items after a <?php echo $discount; ?>% discount is <?php echo $discounted_item; ?>.</p>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>