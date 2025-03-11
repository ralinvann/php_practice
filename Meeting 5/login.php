<?php
    $name = $email = $phone = "";
    $nameErr = $emailErr = $phoneErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
        } else {
            $name = htmlspecialchars($_POST["name"]);
        }

        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
        } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        } else {
            $email = htmlspecialchars($_POST["email"]);
        }

        if (empty($_POST["phone"])) {
            $phoneErr = "Phone number is required";
        } elseif (!preg_match("/^[0-9]*$/", $_POST["phone"])) {
            $phoneErr = "Invalid phone number";
        } else {
            $phone = htmlspecialchars($_POST["phone"]);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Registration</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Registration</h4>
                    </div>
                    <div class="card-body">
                        <form method="post" action="home.php">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" id="name" name="name" class="form-control" value="<?php echo $name; ?>" required>
                                <small class="text-danger"><?php echo $nameErr; ?></small>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" class="form-control" value="<?php echo $email; ?>" required>
                                <small class="text-danger"><?php echo $emailErr; ?></small>
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone Number:</label>
                                <input type="text" id="phone" name="phone" class="form-control" value="<?php echo $phone; ?>" required>
                                <small class="text-danger"><?php echo $phoneErr; ?></small>
                            </div>
                            <div class="form-group text-center">
                                <input type="submit" value="Register" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>