<?php
    class Vehicle {
        protected $brand;
        protected $model;

        public function __construct($brand, $model) {
            $this->brand = $brand;
            $this->model = $model;
        }

        public function getBrand() {
            return $this->brand;
        }

        public function setBrand($brand) {
            $this->brand = $brand;
        }

        public function getModel() {
            return $this->model;
        }

        public function setModel($model) {
            $this->model = $model;
        }

        public function displayInfo() {
            echo "Vehicle Brand: $this->brand, Model: $this->model<br>";
        }
    }

    class Car extends Vehicle {
        private $doors;

        public function __construct($brand, $model, $doors) {
            parent::__construct($brand, $model);
            $this->doors = $doors;
        }

        public function getDoors() {
            return $this->doors;
        }

        public function setDoors($doors) {
            $this->doors = $doors;
        }

        public function displayInfo() {
            parent::displayInfo();
            echo "Car Brand: $this->brand, Model: $this->model, Doors: $this->doors<br>";
        }
    }

    class Motorcycle extends Vehicle {
        private $type;

        public function __construct($brand, $model, $type) {
            parent::__construct($brand, $model);
            $this->type = $type;
        }

        public function getType() {
            return $this->type;
        }

        public function setType($type) {
            $this->type = $type;
        }

        public function displayInfo() {
            parent::displayInfo();
            echo "Motorcycle Brand: $this->brand, Model: $this->model, Type: $this->type<br>";
        }
    }

    $car = new Car("Toyota", "Corolla", 4);
    $motorcycle = new Motorcycle("Honda", "CBR", "Sport");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['car_submit'])) {
            $car->setBrand($_POST["car_brand"]);
            $car->setModel($_POST["car_model"]);
            $car->setDoors($_POST["car_doors"]);
        } elseif (isset($_POST['motorcycle_submit'])) {
            $motorcycle->setBrand($_POST["motorcycle_brand"]);
            $motorcycle->setModel($_POST["motorcycle_model"]);
            $motorcycle->setType($_POST["motorcycle_type"]);
        } elseif (isset($_POST['rectangle_submit'])) {
            $rectangle = new Rectangle($_POST["rectangle_length"], $_POST["rectangle_width"]);
        } elseif (isset($_POST['circle_submit'])) {
            $circle = new Circle($_POST["circle_radius"]);
        }
    }

    abstract class Shape {
        abstract public function calculateArea();
    }

    class Rectangle extends Shape {
        private $length;
        private $width;

        public function __construct($length, $width) {
            $this->length = $length;
            $this->width = $width;
        }

        public function getLength() {
            return $this->length;
        }

        public function setLength($length) {
            $this->length = $length;
        }

        public function getWidth() {
            return $this->width;
        }

        public function setWidth($width) {
            $this->width = $width;
        }

        public function calculateArea() {
            return $this->length * $this->width;
        }

        public function displayInfo() {
            echo "Rectangle Length: $this->length, Width: $this->width, Area: " . $this->calculateArea() . "<br>";
        }
    }

    class Circle extends Shape {
        private $radius;

        public function __construct($radius) {
            $this->radius = $radius;
        }

        public function getRadius() {
            return $this->radius;
        }

        public function setRadius($radius) {
            $this->radius = $radius;
        }

        public function calculateArea() {
            return pi() * pow($this->radius, 2);
        }

        public function displayInfo() {
            echo "Circle Radius: $this->radius, Area: " . $this->calculateArea() . "<br>";
        }
    }

    $rectangle = new Rectangle(10, 5);
    $circle = new Circle(7);

    $shapes = [$rectangle, $circle];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle and Shape Information</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title text-center">Car Information</h1>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="car_brand">Brand:</label>
                        <input type="text" class="form-control" id="car_brand" name="car_brand" placeholder="Enter car brand" value="<?php echo htmlspecialchars($car->getBrand()); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="car_model">Model:</label>
                        <input type="text" class="form-control" id="car_model" name="car_model" placeholder="Enter car model" value="<?php echo htmlspecialchars($car->getModel()); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="car_doors">Doors:</label>
                        <input type="number" class="form-control" id="car_doors" name="car_doors" placeholder="Enter number of doors" value="<?php echo htmlspecialchars($car->getDoors()); ?>" required>
                    </div>
                    <button type="submit" name="car_submit" class="btn btn-primary btn-block">Submit</button>
                </form>
                <div class="result mt-3">
                    <?php $car->displayInfo(); ?>
                </div>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-body">
                <h1 class="card-title text-center">Motorcycle Information</h1>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="motorcycle_brand">Brand:</label>
                        <input type="text" class="form-control" id="motorcycle_brand" name="motorcycle_brand" placeholder="Enter motorcycle brand" value="<?php echo htmlspecialchars($motorcycle->getBrand()); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="motorcycle_model">Model:</label>
                        <input type="text" class="form-control" id="motorcycle_model" name="motorcycle_model" placeholder="Enter motorcycle model" value="<?php echo htmlspecialchars($motorcycle->getModel()); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="motorcycle_type">Type:</label>
                        <input type="text" class="form-control" id="motorcycle_type" name="motorcycle_type" placeholder="Enter motorcycle type" value="<?php echo htmlspecialchars($motorcycle->getType()); ?>" required>
                    </div>
                    <button type="submit" name="motorcycle_submit" class="btn btn-primary btn-block">Submit</button>
                </form>
                <div class="result mt-3">
                    <?php $motorcycle->displayInfo(); ?>
                </div>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-body">
                <h1 class="card-title text-center">Rectangle Information</h1>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="rectangle_length">Length:</label>
                        <input type="number" class="form-control" id="rectangle_length" name="rectangle_length" placeholder="Enter rectangle length" value="<?php echo htmlspecialchars($rectangle->getLength()); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="rectangle_width">Width:</label>
                        <input type="number" class="form-control" id="rectangle_width" name="rectangle_width" placeholder="Enter rectangle width" value="<?php echo htmlspecialchars($rectangle->getWidth()); ?>" required>
                    </div>
                    <button type="submit" name="rectangle_submit" class="btn btn-primary btn-block">Submit</button>
                </form>
                <div class="result mt-3">
                    <?php $rectangle->displayInfo(); ?>
                </div>
            </div>
        </div>

        <div class="card mt-5">
            <div class="card-body">
                <h1 class="card-title text-center">Circle Information</h1>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="circle_radius">Radius:</label>
                        <input type="number" class="form-control" id="circle_radius" name="circle_radius" placeholder="Enter circle radius" value="<?php echo htmlspecialchars($circle->getRadius()); ?>" required>
                    </div>
                    <button type="submit" name="circle_submit" class="btn btn-primary btn-block">Submit</button>
                </form>
                <div class="result mt-3">
                    <?php $circle->displayInfo(); ?>
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