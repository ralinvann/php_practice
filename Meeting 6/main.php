<?php
    class Person {
        public $name;
        public $age;

        public function __construct($name, $age) {
            $this->name = $name;
            $this->age = $age;
        }

        public function setName($name) {
            $this->name = $name;
        }
        public function setAge($age) {
            $this->age = $age;
        }

        public function getName() {
            return $this->name;
        }
        public function getAge() {
            return $this->age;
        }
    }

    class Product {
        public $name;
        public $price;
        public $quantity;

        public function __construct($name, $price, $quantity) {
            $this->name = $name;
            $this->price = $price;
            $this->quantity = $quantity;
        }
        
        public function calculateTotalPrice() {
            return $this->price * $this->quantity;
        }

        public function getName() {
            return $this->name;
        }
        public function getPrice() {
            return $this->price;
        }
        public function getQuantity() {
            return $this->quantity;
        }
    }

    $person = new Person('Jane Doe', 20);
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['person_submit'])) {
        $person->setName($_POST["name"]);
        $person->setAge($_POST["age"]);
    }

    $product = new Product('Apple', 10000, 5);
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_submit'])) {
        $product = new Product($_POST["product_name"], $_POST["product_price"], $_POST["product_quantity"]);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person and Product Form</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title text-center">Person Information</h1>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="<?php echo htmlspecialchars($person->getName()); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="age">Age:</label>
                        <input type="number" class="form-control" id="age" name="age" placeholder="Enter age" value="<?php echo htmlspecialchars($person->getAge()); ?>" required>
                    </div>
                    <button type="submit" name="person_submit" class="btn btn-primary btn-block">Submit</button>
                </form>
                <div class="result mt-3">
                    <p>Name: <?php echo htmlspecialchars($person->getName()); ?></p>
                    <p>Age: <?php echo htmlspecialchars($person->getAge()); ?></p>
                </div>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-body">
                <h1 class="card-title text-center">Product Information</h1>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="product_name">Product Name:</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter product name" value="<?php echo htmlspecialchars($product->getName()); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="product_quantity">Quantity:</label>
                        <input type="number" class="form-control" id="product_quantity" name="product_quantity" placeholder="Enter quantity" value="<?php echo htmlspecialchars($product->getQuantity()); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="product_price">Price:</label>
                        <input type="number" class="form-control" id="product_price" name="product_price" placeholder="Enter price" value="<?php echo htmlspecialchars($product->getPrice()); ?>" required>
                    </div>
                    <button type="submit" name="product_submit" class="btn btn-primary btn-block">Submit</button>
                </form>
                <div class="result mt-3">
                    <p>Product name: <?php echo htmlspecialchars($product->getName()); ?></p>
                    <p>Total price: <?php echo htmlspecialchars($product->calculateTotalPrice()); ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>