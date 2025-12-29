<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    session_start();
    require_once "conection.php";

    $firstname = $_POST["firstName"];
    $lastname = $_POST["lastName"];
    $email = $_POST["email"];

    
    $pasi = password_hash($_POST["pasi"], PASSWORD_DEFAULT); // me hashu kishe pasin
    $photoo = $_FILES['photo']['name']; // e nmarrum file
    $extension = pathinfo($photoo, PATHINFO_EXTENSION); // me ja marr png e kto na vyn me i bashku me nr ne uploadPath
    $newFileName = round(microtime(true)) . '.' . $extension; // me e bo me numra
    $uploadPath = "./images/" . $newFileName; //krejt path

    try {
        $sql = "INSERT INTO users (username, lastname, email, password, photo_url) VALUES (:username, :lastname, :email, :password, :photo_url)";
        $st = $pdo->prepare($sql);
        $st->bindParam(":username", $firstname);
        $st->bindParam(":lastname", $lastname);
        $st->bindParam(":email", $email);
        $st->bindParam(":password", $pasi);
        $st->bindParam(":photo_url", $newFileName);

        // FOTOJA
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $uploadPath)) {
            $st->execute(); //datat mu ru ne databaz
            $_SESSION['uploadedPhoto'] = $newFileName; // Sme e shti foton ne session
            header("Location: ../getDemo.php"); // me e qu te getDemo
            exit();
        } else {
            throw new Exception("Failed to upload the file.");
        }
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    http_response_code(405);
    echo "Method Not Allowed";
}
