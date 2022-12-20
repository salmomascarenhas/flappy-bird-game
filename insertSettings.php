<?php
include_once("Database.php");

$formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);


$db = new Database();
$conn = $db->getConnection("root", "", "localhost", "game");


$stmt = $conn->prepare("INSERT INTO settings (username, scenary, points) VALUES (?,?, ?)");
// $stmt->execute([$formData['username'], $formData['scenary'], 0]);

echo json_encode(true);

// $settings->saveSettings();

// echo $settings->__toString();

?>