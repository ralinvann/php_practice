<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Ambil nilai dari formulir
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];

        echo "Welcome, $name!\n";
        echo "Your email address is $email.\n";
        echo "Your phone number is $phone.\n";
    } else {
        // Jika formulir tidak dikirim melalui metode POST, lakukan sesuatu yang sesuai
        echo "Unauthorized access.";
    }
?>