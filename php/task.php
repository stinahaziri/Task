<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    require_once "conection.php";

    if (!isset($_POST["mainInput"]) || empty($_POST["mainInput"])) {
        echo json_encode(["status" => "error", "message" => "Task name is missing"]);
        exit();
    }

    $username = $_POST["mainInput"];

    try {
        $sql = "INSERT INTO tasks (username) VALUES (:username);";
        $st = $pdo->prepare($sql);
        $st->bindParam(":username", $username);
        $st->execute();

        echo json_encode(["status" => "success", "message" => "Task added successfully"]);
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method"]);
}
?>
